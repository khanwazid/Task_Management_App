<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Exception;

class TaskController extends Controller
{
    
    public function index()
{
    try {
        $tasks = auth()->user()->tasks()->latest()->paginate(20);
        return view('dashboard', compact('tasks'));
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
}


    public function store(Request $request)
{
    try {
        $validated = $request->validate([
          'title'       => 'required|string|min:3|max:255',
            'description' => 'required|string|min:5|max:500',
             'priority'    => 'required|in:low,medium,high', // Added priority validation
            'status'      => 'required|in:pending,in_progress,completed',
            'due_date'    => 'required|date',
             'taskimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('taskimage')) {
            $image = $request->file('taskimage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/taskimages', $filename);
            $validated['taskimage'] = $filename;
        }

        auth()->user()->tasks()->create($validated);

        return redirect()->back()->with('success', 'Task created successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong! Please try again.');
    }
}



public function update(Request $request, Task $task)
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


        $updateData = [
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'priority'    => $validated['priority'],
            'status'      => $validated['status'],
            'due_date'    => $validated['due_date']
          
        ];

     // Handle image upload or deletion
        if ($request->hasFile('taskimage')) {
            // If a new image is uploaded, replace the old one
            if ($task->taskimage) {
                Storage::delete('public/taskimages/' . basename($task->taskimage));
            }
            
            $image = $request->file('taskimage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/taskimages', $filename);
            $updateData['taskimage'] = $filename;
        } 
        // Only delete the image if explicitly requested and no new image is uploaded
        elseif ($request->has('delete_image') && $task->taskimage) {
            Storage::delete('public/taskimages/' . basename($task->taskimage));
            $updateData['taskimage'] = null;
        }

        $task->update($updateData);

        return redirect()->back()->with('success', 'Task updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong! Please try again.');
    }
}

public function destroy(Task $task)
{
    try {
        if ($task->taskimage) {
            Storage::delete('public/taskimages/' . $task->taskimage);
        }
        $task->delete();
        return redirect()->back()->with('success', 'Task deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong! Please try again.');
    }
}


                  //Admin Section
                  
public function indexs()
{
    try {
        // Check if the user is an admin
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to view all tasks.');
        }

        // Fetch tasks for all users and paginate the results
        $tasks = Task::latest()->paginate(20);

        // Fetch all tasks for accurate statistics (not paginated)
        $allTasks = Task::all();
        return view('admin-dashboard', compact('tasks', 'allTasks'));

       // return view('admin-dashboard', compact('tasks'));
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }

}
public function updates(Request $request, Task $task)
{
    try {
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access.');
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

       // Handle image upload or deletion
       if ($request->hasFile('taskimage')) {
        // If a new image is uploaded, replace the old one
        if ($task->taskimage) {
            Storage::delete('public/taskimages/' . basename($task->taskimage));
        }
        
        $image = $request->file('taskimage');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/taskimages', $filename);
        $updateData['taskimage'] = $filename;
    } 
    // Only delete the image if explicitly requested and no new image is uploaded
    elseif ($request->has('delete_image') && $task->taskimage) {
        Storage::delete('public/taskimages/' . basename($task->taskimage));
        $updateData['taskimage'] = null;
    }

    $task->update($updateData);

        return redirect()->back()->with('success', 'Task updated successfully.');

    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()
            ->withErrors($e->errors())
            ->withInput();
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong! Please try again.');
    }
}

public function show(Task $task)
{
    // Check if user is admin
    if (auth()->user()->role !== 'admin') {
        return response()->json(['error' => 'Unauthorized access'], 403);
    }

    return response()->json([
        'task' => $task->load('user'),
        'success' => true
    ]);
}


public function destroys(Task $task)
{
    if (auth()->user()->role !== 'admin') {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    try {
        if ($task->taskimage) {
            Storage::delete('public/taskimages/' . $task->taskimage);
        }
        $task->delete();
        return redirect()->back()->with('success', 'Task deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong! Please try again.');
    }
}


public function getUsers()
{
    $users = User::select('id', 'name', 'email', 'role', 'created_at', 'enable')
        ->where('role', '!=', 'admin')
        ->paginate(5);
    
    $userCount = User::where('role', '!=', 'admin')->count();
    
    return response()->json([
        'users' => $users,
        'userCount' => $userCount
    ]);
}

public function toggleStatus($id)
{
    $user = User::findOrFail($id);
    $user->enable = $user->enable == 0 ? 1 : 0; // Flip status correctly
    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'User status updated successfully',
        'new_status' => $user->enable
    ]);
}



public function getTasks()
{
    $tasks = Task::with('user')->paginate(5);
    $taskCount = Task::count();

    return response()->json([
        'tasks' => $tasks,
        'taskCount' => $taskCount
    ]);
}

public function stores(Request $request)
{
    try {
        $validated = $request->validate([
          'title'       => 'required|string|min:3|max:255',
            'description' => 'required|string|min:5|max:500',
             'priority'    => 'required|in:low,medium,high', // Added priority validation
            'status'      => 'required|in:pending,in_progress,completed',
            'due_date'    => 'required|date',
             'taskimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('taskimage')) {
            $image = $request->file('taskimage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/taskimages', $filename);
            $validated['taskimage'] = $filename;
        }

        auth()->user()->tasks()->create($validated);

        return redirect()->back()->with('success', 'Task created successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong! Please try again.');
    }
}
}