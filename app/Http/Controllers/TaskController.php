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

}
