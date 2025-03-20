<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Models\Report;
use App\Models\TaskNote;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;


class TaskController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
           'title'       => 'required|string|min:3|max:255',
            'description' => 'required|string|min:5|max:500',
             'priority'    => 'required|in:low,medium,high', // Added priority validation
            'status'      => 'required|in:pending,in_progress,completed',
            'due_date'    => 'required|date',
             'taskimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $validator->validated();
            
            // Set the authenticated user's ID
            $data['user_id'] = Auth::id();
            
            // Handle file upload if present
            if ($request->hasFile('taskimage')) {
                $path = $request->file('taskimage')->store('taskimages', 'public');
                $data['taskimage'] = $path;
            }
            
            $task = Task::create($data);
            
       


            // Return the newly created post using a resource
        return response()->json([
            'success' => true,
            'data' => new TaskResource($task),
            'message' => 'Task created successfully',
        ], 201);


        }
            catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create task',
                    'error'   => $e->getMessage()
                ], 500);
        }
    }
    public function update(Request $request, $id)
{
    // Validate the request
  
 $validator = Validator::make($request->all(), [
        'title'       => 'required|string|min:3|max:255',
        'description' => 'required|string|min:5|max:500',
        'priority'    => 'required|in:low,medium,high',
        'status'      => 'required|in:pending,in_progress,completed',
        'due_date'    => 'required|date',
        'taskimage'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }

    try {
        // Find the task
        $task = Task::findOrFail($id);
        
        // Check if the authenticated user owns this task
        if ($task->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized to update this task'
            ], 403);
        }
        
        $data = $validator->validated();
        
        // Handle file upload if present
        if ($request->hasFile('taskimage')) {
            // Delete old image if exists
            if ($task->taskimage) {
                Storage::disk('public')->delete($task->taskimage);
            }
            
            $path = $request->file('taskimage')->store('taskimages', 'public');
            $data['taskimage'] = $path;
        }
        
        // Update the task
        $task->update($data);
        
        // Return the updated task
        return response()->json([
            'success' => true,
            'data' => new TaskResource($task),
            'message' => 'Task updated successfully',
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to update task',
            'error'   => $e->getMessage()
        ], 500);
    }
}

public function destroy($id)
{
    try {
        // Find the task
        $task = Task::findOrFail($id);
        
        // Check if the authenticated user owns this task
        if ($task->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized to delete this task'
            ], 403);
        }

        // Delete the task image if it exists
        if ($task->taskimage) {
            Storage::disk('public')->delete($task->taskimage);
        }

        // Delete the task
        $task->delete();

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully'
        ], 200);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Task not found'
        ], 404);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to delete task',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function index(Request $request)
{
    try {
        // Start with a query for the authenticated user's tasks
        $query = Task::where('user_id', Auth::id());

        // Apply filters if provided
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->has('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('due_date')) {
            $query->whereDate('due_date', $request->due_date);
        }

        // Date range filtering
        if ($request->has('due_date_from')) {
            $query->whereDate('due_date', '>=', $request->due_date_from);
        }

        if ($request->has('due_date_to')) {
            $query->whereDate('due_date', '<=', $request->due_date_to);
        }

         $query->with('notes');

         $query->with(['reports' => function ($query) {
            $query->select('id', 'task_id', 'admin_id', 'reason', 'created_at')
                  ->with('admin:id,name'); // Only fetch 'id' and 'name' from the admin model
        }]);

        // Paginate the results
        $perPage = $request->input('per_page', 20);
        $tasks = $query->paginate($perPage);

        // Check if there are no matching tasks
        if ($tasks->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No tasks found matching the criteria',
                'data' => [],
                'pagination' => [
                    'total' => 0,
                    'per_page' => $perPage,
                    'current_page' => 1,
                    'last_page' => 1,
                    'from' => null,
                    'to' => null
                ]
            ], 200);
        }

        // Return the tasks as a resource collection
        return response()->json([
            'success' => true,
            'data' => TaskResource::collection($tasks),
            'message' => 'Tasks retrieved successfully.',
            'pagination' => [
                'total' => $tasks->total(),
                'per_page' => $tasks->perPage(),
                'current_page' => $tasks->currentPage(),
                'last_page' => $tasks->lastPage(),
                'from' => $tasks->firstItem(),
                'to' => $tasks->lastItem()
            ]
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve tasks',
            'error' => $e->getMessage()
        ], 500);
    }
}



                                  //ADMIN SECTION

    
                public function updateTask(Request $request, Task $task)
    {
        try {
            if (auth()->user()->role !== 'admin') {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized access.'
                ], 403);
            }

            $validated = $request->validate([
                'title'       => 'required|string|min:3|max:255',
                'description' => 'required|string|min:5|max:500',
                'priority'    => 'required|in:low,medium,high',
                'status'      => 'required|in:pending,in_progress,completed',
                'due_date'    => 'required|date',
                'taskimage'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $updateData = [
                'title'       => $validated['title'],
                'description' => $validated['description'],
                'priority'    => $validated['priority'],
                'status'      => $validated['status'],
                'due_date'    => $validated['due_date'],
                'user_id'     => $task->user_id
            ];

            // Checking if the image should be deleted
            if ($request->has('delete_image') && $task->taskimage) {
                Storage::delete('public/taskimages/' . $task->taskimage);
                $updateData['taskimage'] = null;
            }
            // If a new image is uploaded, it takes precedence over deletion
            elseif ($request->hasFile('taskimage')) {
                if ($task->taskimage) {
                    Storage::delete('public/taskimages/' . $task->taskimage);
                }
                
                $image = $request->file('taskimage');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/taskimages', $filename);
                $updateData['taskimage'] = $filename;
            }

            $task->update($updateData);

      

            return response()->json([
                'success' => true,
                'data'    => new TaskResource($task),
                'message' => 'Task updated successfully',
            ], 200);
            

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong! Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function storeTask(Request $request)
    {
        try {
            $validated = $request->validate([
                'title'       => 'required|string|min:3|max:255',
                'description' => 'required|string|min:5|max:500',
                'priority'    => 'required|in:low,medium,high',
                'status'      => 'required|in:pending,in_progress,completed',
                'due_date'    => 'required|date',
                'taskimage'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($request->hasFile('taskimage')) {
                $image = $request->file('taskimage');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/taskimages', $filename);
                $validated['taskimage'] = $filename;
            }

            $task = auth()->user()->tasks()->create($validated);

          /*  return response()->json([
                'success' => true,
                'message' => 'Task created successfully.',
                'data' => $task
            ], 201);*/

             // Return the newly created post using a resource
        return response()->json([
            'success' => true,
            'data' => new TaskResource($task),
            'message' => 'Task created successfully',
        ], 201);


        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong! Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function destroyTask(Task $task)
    {
        try {
            if (auth()->user()->role !== 'admin') {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized action.'
                ], 403);
            }

            if ($task->taskimage) {
                Storage::delete('public/taskimages/' . $task->taskimage);
            }
            
            $task->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Task deleted successfully.'
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong! Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function adminIndex(Request $request)
    {
        try {
            // Check if user is admin
            if (Auth::user()->role !== 'admin') {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized access. Admin privileges required.'
                ], 403);
            }

            // Start with a query for all tasks
            $query = Task::query();
            
            // Filter by user_id if provided
            if ($request->has('user_id')) {
                $query->where('user_id', $request->user_id);
            }

            // Apply filters if provided
            if ($request->has('title')) {
                $query->where('title', 'like', '%' . $request->title . '%');
            }

            if ($request->has('priority')) {
                $query->where('priority', $request->priority);
            }

            if ($request->has('status')) {
                $query->where('status', $request->status);
            }

            if ($request->has('due_date')) {
                $query->whereDate('due_date', $request->due_date);
            }

            // Date range filtering
            if ($request->has('due_date_from')) {
                $query->whereDate('due_date', '>=', $request->due_date_from);
            }

            if ($request->has('due_date_to')) {
                $query->whereDate('due_date', '<=', $request->due_date_to);
            }

            // Include related notes
            $query->with('notes');
            
            // Include user information
            $query->with('user:id,name,email');

            $query->with(['reports' => function ($query) {
                $query->select('id', 'task_id', 'admin_id', 'reason', 'created_at')
                      ->with('admin:id,name'); // Only fetch 'id' and 'name' from the admin model
            }]);

                    // Order by created_at by default (newest first)
        $query->orderBy($request->input('sort_by', 'created_at'), $request->input('sort_direction', 'desc'));


            // Paginate the results
            $perPage = $request->input('per_page', 20);
            $tasks = $query->paginate($perPage);

            // Check if there are no matching tasks
            if ($tasks->isEmpty()) {
                return response()->json([
                    'success' => true,
                    'message' => 'No tasks found matching the criteria',
                    'data' => [],
                    'pagination' => [
                        'total' => 0,
                        'per_page' => $perPage,
                        'current_page' => 1,
                        'last_page' => 1,
                        'from' => null,
                        'to' => null
                    ]
                ], 200);
            }

            // Return the tasks as a resource collection
            return response()->json([
                'success' => true,
                'data' => TaskResource::collection($tasks),
                'message' => 'All tasks retrieved successfully.',
                'pagination' => [
                    'total' => $tasks->total(),
                    'per_page' => $tasks->perPage(),
                    'current_page' => $tasks->currentPage(),
                    'last_page' => $tasks->lastPage(),
                    'from' => $tasks->firstItem(),
                    'to' => $tasks->lastItem()
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve tasks',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
