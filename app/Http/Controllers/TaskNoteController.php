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
            'content' => 'required|string|max:1000'
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
            'content' => 'required|string|max:1000'
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





}
