<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskNote;
use App\Models\Task;
use Illuminate\Validation\ValidationException;
use Exception;

class TaskNoteController extends Controller
{

 
public function getNotes(Task $task)
{
    try {
        return view('dashboard', ['task' => $task]);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
    }
}


public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'content' => 'required|string|min:5|max:1000'
        ]);

        TaskNote::create([
            'task_id' => $validated['task_id'],
            'user_id' => auth()->id(),
            'content' => $validated['content']
        ]);

        
        return redirect()->back()->with('success', 'Note added successfully.');
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()
            ->withErrors($e->errors())
            ->withInput();
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'An unexpected error occurred. Please try again later.')
            ->withInput();
    }
}


public function destroy(TaskNote $note)
{
    try {
        $taskId = $note->task_id;
        $note->delete();

        return redirect()->back()->with('success', 'Note deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
    }
}

public function update(Request $request, TaskNote $note)
{
    try {
        $validated = $request->validate([
            'content' => 'required|string|min:5|max:1000'
        ]);

        $note->update([
            'content' => $validated['content']
        ]);

        return redirect()->back()->with('success', 'Note updated successfully!');
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()
            ->withErrors($e->errors())
            ->withInput();
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'An unexpected error occurred. Please try again later.')
            ->withInput();
    }
}

   
  
   


public function edit(TaskNote $note)
{
    try {
        return response()->json([
            'content' => $note->content
        ]);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong while fetching the note.');
    }
}

                //Admin Section
    
    
public function getNote(Task $task)
{
    try {
        // Ensure only admin can access this method
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        return view('admin-dashboard', ['task' => $task]);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
    }
}


public function stores(Request $request)
{
    try {
        // Ensure only admin can access this method
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $validated = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'content' => 'required|string|min:5|max:1000'
        ]);

        // Get the task and its owner
        $task = Task::findOrFail($validated['task_id']);
        $taskOwnerId = $task->user_id; // Getting the user who owns the task

        TaskNote::create([
            'task_id' => $validated['task_id'],
            'user_id' => $taskOwnerId, // Storing the task owner's ID, not admin's
            'content' => $validated['content']
        ]);

        return redirect()->back()->with('success', 'Note added successfully.');
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()
            ->withErrors($e->errors())
            ->withInput();
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'An unexpected error occurred. Please try again later.')
            ->withInput();
    }
}

public function destroys(TaskNote $note)
{
    try {
        // Ensure only admin can delete notes
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $note->delete();

        return redirect()->back()->with('success', 'Note deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
    }
}

public function edits(TaskNote $note)
{
    try {
        // Ensure only admin can access this method
        if (auth()->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized access.'], 403);
        }

        return response()->json([
            'content' => $note->content
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Something went wrong while fetching the note.'], 500);
    }
}

public function updates(Request $request, TaskNote $note)
{
    try {
        // Ensure only admin can access this method
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $validated = $request->validate([
            'content' => 'required|string|min:5|max:1000'
        ]);

        $note->update([
            'content' => $validated['content']
        ]);

        return redirect()->back()->with('success', 'Note updated successfully!');
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()
            ->withErrors($e->errors())
            ->withInput();
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'An unexpected error occurred. Please try again later.')
            ->withInput();
    }
}


}
