<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReportController extends Controller
{
    
public function getNotes(Task $task)
{
    try {
        return view('admin-dashboard', ['task' => $task]);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
    }
}

public function store(Request $request, Task $task)
{
    try {
        // Check if report already exists for this task
        if ($task->reports()->exists()) {
            return redirect()->back()
                ->with('error', 'A report already exists for this task');
        }

        $validated = $request->validate([
            'reason' => 'required|string|min:5|max:1000'
        ]);

        $report = Report::create([
            'task_id' => $task->id,
            'admin_id' => auth()->id(),
            'reason' => $validated['reason']
        ]);

        return redirect()->back()
            ->with('success', 'Report added successfully');

    } catch (ValidationException $e) {
        return redirect()->back()
            ->withErrors($e->errors())
            ->withInput();
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Failed to create report. Please try again.');
    }
}

public function update(Request $request, Report $report)
{
    try {
        // Validate request data
        $validated = $request->validate([
            'reason' => 'required|string|min:5|max:1000'
        ]);

        // Update the report
        $report->update($validated);

        return redirect()->back()
            ->with('success', 'Report updated successfully');

    } catch (ValidationException $e) {
        return redirect()->back()
            ->withErrors($e->errors())
            ->withInput();
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Failed to update report. Please try again.');
    }
}

    
public function fetch(Report $report)
{
    return response()->json([
        'id' => $report->id,
        'reason' => $report->reason
    ]);
}


public function destroy(Report $report)
{
    try {
        $taskId = $report->task_id;
        $report->delete();

        return redirect()->back()->with('success', 'Report deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
    }
}

}
