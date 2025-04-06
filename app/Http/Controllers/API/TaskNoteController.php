<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TaskNote;
use App\Models\Task;
use App\Http\Resources\TaskNoteResource;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;




class TaskNoteController extends Controller
{
    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'content' => 'required|string|min:5|max:1000'
        ]);

        // Get the task
        $task = Task::findOrFail($validated['task_id']);
        
        // Check if the authenticated user owns this task
        if ($task->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to add notes to this task.'
            ], 403);
        }

        $taskNote = TaskNote::create([
            'task_id' => $validated['task_id'],
            'user_id' => auth()->id(),
            'content' => $validated['content']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Note added successfully.',
            'data' => $taskNote
        ], 201);
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $e->errors()
        ], 422);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred. Please try again later.',
            'error' => $e->getMessage()
        ], 500);
    }
}

  
    public function update(Request $request, $id)
{
    try {
        // Find the task note
        $taskNote = TaskNote::findOrFail($id);
        
        // Check if the authenticated user is the owner of the note
        if ($taskNote->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to update this note.'
            ], 403);
        }
        
        // Validate the request
        $validated = $request->validate([
            'content' => 'required|string|min:5|max:1000'
        ]);
        
        // Update the task note
        $taskNote->update([
            'content' => $validated['content']
        ]);
        
        // Return the updated task note
        return response()->json([
            'success' => true,
            'message' => 'Note updated successfully.',
            'data' => $taskNote
        ], 200);
        
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Note not found.'
        ], 404);
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $e->errors()
        ], 422);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred. Please try again later.',
            'error' => $e->getMessage()
        ], 500);
    }
}
public function destroy($id)
{
    try {
        $note = TaskNote::findOrFail($id);

        if ($note->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to delete this note.'
            ], 403);
        }

        $note->delete();

        return response()->json([
            'success' => true,
            'message' => 'Note deleted successfully!'
        ], 200);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Note not found.'
        ], 404);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred. Please try again later.',
            'error' => $e->getMessage()
        ], 500);
    }
}



    public function index(Request $request)
{
    try {
        // Query for notes belonging to the authenticated user
        $query = TaskNote::where('user_id', auth()->id());
        
        // Filter by task_id if provided
        if ($request->has('task_id')) {
            $query->where('task_id', $request->task_id);
        }
        
        // Order by creation date (newest first by default)
        $query->orderBy('created_at', $request->input('order', 'desc'));
        
        // Paginate the results
        $perPage = $request->input('per_page', 20);
        $notes = $query->paginate($perPage);
        
        // Check if there are no notes
        if ($notes->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No notes found',
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
        
        // Return the notes with pagination
        return response()->json([
            'success' => true,
            'message' => 'Notes retrieved successfully.',
            'data' => TaskNoteResource::collection($notes),
            'pagination' => [
                'total' => $notes->total(),
                'per_page' => $notes->perPage(),
                'current_page' => $notes->currentPage(),
                'last_page' => $notes->lastPage(),
                'from' => $notes->firstItem(),
                'to' => $notes->lastItem()
            ]
        ], 200);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve notes',
            'error' => $e->getMessage()
        ], 500);
    }
}

                                //ADMIN SECTION

                                public function storeNote(Request $request)
                                {
                                    try {
                                        $validated = $request->validate([
                                            'task_id' => 'required|exists:tasks,id',
                                            'content' => 'required|string|min:5|max:1000'
                                        ]);
                                
                                        // Get the task
                                        $task = Task::findOrFail($validated['task_id']);
                                        
                                        // Check if the authenticated user is the owner of the task
                                        if ($task->user_id !== auth()->id()) {
                                            return response()->json([
                                                'success' => false,
                                                'message' => 'You can only add notes to your own tasks.'
                                            ], 403);
                                        }
                                
                                        $taskNote = TaskNote::create([
                                            'task_id' => $validated['task_id'],
                                            'user_id' => auth()->id(),
                                            'content' => $validated['content']
                                        ]);
                                
                                        return response()->json([
                                            'success' => true,
                                            'message' => 'Note added successfully.',
                                            'data' => $taskNote
                                        ], 201);
                                
                                    } catch (\Illuminate\Validation\ValidationException $e) {
                                        return response()->json([
                                            'success' => false,
                                            'message' => 'Validation failed.',
                                            'errors' => $e->errors()
                                        ], 422);
                                
                                    } catch (\Exception $e) {
                                        return response()->json([
                                            'success' => false,
                                            'message' => 'An unexpected error occurred. Please try again later.',
                                            'error' => $e->getMessage()
                                        ], 500);
                                    }
                                }
                                
                                public function updateNote(Request $request, $id)
                            {
                                try {
                                    // Find the task note
                                    $taskNote = TaskNote::findOrFail($id);
                                    
                                    // Check if the authenticated user is the owner of the note
                                    if ($taskNote->user_id !== auth()->id()) {
                                        return response()->json([
                                            'success' => false,
                                            'message' => 'You are not authorized to update this note.'
                                        ], 403);
                                    }
                                    
                                    // Validate the request
                                    $validated = $request->validate([
                                        'content' => 'required|string|min:5|max:1000'
                                    ]);
                                    
                                    // Update the task note
                                    $taskNote->update([
                                        'content' => $validated['content']
                                    ]);
                                    
                                    // Return the updated task note
                                    return response()->json([
                                        'success' => true,
                                        'message' => 'Note updated successfully.',
                                        'data' => $taskNote
                                    ], 200);
                                    
                                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                                    return response()->json([
                                        'success' => false,
                                        'message' => 'Note not found.'
                                    ], 404);
                                    
                                } catch (\Illuminate\Validation\ValidationException $e) {
                                    return response()->json([
                                        'success' => false,
                                        'message' => 'Validation failed.',
                                        'errors' => $e->errors()
                                    ], 422);
                                    
                                } catch (\Exception $e) {
                                    return response()->json([
                                        'success' => false,
                                        'message' => 'An unexpected error occurred. Please try again later.',
                                        'error' => $e->getMessage()
                                    ], 500);
                                }
                            }
                            public function destroyNote($id)
                            {
                                try {
                                    $note = TaskNote::findOrFail($id);
                            
                                    if ($note->user_id !== auth()->id()) {
                                        return response()->json([
                                            'success' => false,
                                            'message' => 'You are not authorized to delete this note.'
                                        ], 403);
                                    }
                            
                                    $note->delete();
                            
                                    return response()->json([
                                        'success' => true,
                                        'message' => 'Note deleted successfully!'
                                    ], 200);
                                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                                    return response()->json([
                                        'success' => false,
                                        'message' => 'Note not found.'
                                    ], 404);
                                } catch (\Exception $e) {
                                    return response()->json([
                                        'success' => false,
                                        'message' => 'An unexpected error occurred. Please try again later.',
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
                        
                                    // Starting with a query for all notes
                                    $query = TaskNote::query();
                                    
                                    // Filtering by user_id if provided
                                    if ($request->has('user_id')) {
                                        $query->where('user_id', $request->user_id);
                                    }
                                    
                                    // Filter by task_id if provided
                                    if ($request->has('task_id')) {
                                        $query->where('task_id', $request->task_id);
                                    }
                                    
                                    // Include related task and user information
                                    $query->with(['task:id,title,user_id', 'user:id,name,email']);
                        
                                    // Order by creation date
                                    $query->orderBy('created_at', $request->input('order', 'desc'));
                        
                                    // Paginate the results
                                    $perPage = $request->input('per_page', 20);
                                    $notes = $query->paginate($perPage);
                        
                                    // Check if there are no notes
                                    if ($notes->isEmpty()) {
                                        return response()->json([
                                            'success' => true,
                                            'message' => 'No notes found',
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
                        
                                    // Return the notes with pagination
                                    return response()->json([
                                        'success' => true,
                                        'message' => 'All notes retrieved successfully.',
                                        'data' => TaskNoteResource::collection($notes),
                                        'pagination' => [
                                            'total' => $notes->total(),
                                            'per_page' => $notes->perPage(),
                                            'current_page' => $notes->currentPage(),
                                            'last_page' => $notes->lastPage(),
                                            'from' => $notes->firstItem(),
                                            'to' => $notes->lastItem()
                                        ]
                                    ], 200);
                                } catch (\Exception $e) {
                                    return response()->json([
                                        'success' => false,
                                        'message' => 'Failed to retrieve notes',
                                        'error' => $e->getMessage()
                                    ], 500);
                                }
                            }

}
