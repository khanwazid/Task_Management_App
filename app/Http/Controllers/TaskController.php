<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
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
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:500',
             'priority'    => 'required|in:low,medium,high', // Added priority validation
            'status'      => 'required|in:pending,in_progress,completed',
            'due_date'    => 'required|date'
        ]);

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
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'priority'    => 'required|in:low,medium,high',
            'status'      => 'required|in:pending,in_progress,completed',
            'due_date'    => 'required|date'
        ]);

        $task->update($validated);

        return redirect()->back()->with('success', 'Task updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong! Please try again.');
    }
}

public function destroy(Task $task)
{
    try {
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

        return view('admin-dashboard', compact('tasks'));
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }

}

public function updates(Request $request, Task $task)
{
    try {
        // Ensuring only admin can update tasks
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'priority'    => 'required|in:low,medium,high',
            'status'      => 'required|in:pending,in_progress,completed',
            'due_date'    => 'required|date'
        ]);

        // Ensured user_id remains unchanged (it belongs to the original task owner)
        $task->update([
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'priority'    => $validated['priority'],
            'status'      => $validated['status'],
            'due_date'    => $validated['due_date'],
            'user_id'     => $task->user_id // Keeping the same user ID
        ]);

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
        ->get();
    
    $userCount = $users->count();
    
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


}