<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ReportController extends Controller
{
    public function store(Request $request, Task $task)
    {
        try {
            // Check if user is admin
            if (Auth::user()->role !== 'admin') {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized access. Admin privileges required.'
                ], 403);
            }

            // Check if report already exists for this task
            if ($task->reports()->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'A report already exists for this task'
                ], 422);
            }

            $validated = $request->validate([
                'reason' => 'required|string|min:5|max:1000'
            ]);

            $report = Report::create([
                'task_id' => $task->id,
                'admin_id' => auth()->id(),
                'reason' => $validated['reason']
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Report added successfully',
                'data' => $report
            ], 201);
            
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create report. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function update(Request $request, Report $report)
    {
        try {
            // Check if user is admin
            if (Auth::user()->role !== 'admin') {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized access. Admin privileges required.'
                ], 403);
            }

            // Validate request data
            $validated = $request->validate([
                'reason' => 'required|string|min:5|max:1000'
            ]);

            // Update the report
            $report->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Report updated successfully',
                'data' => $report
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update report. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function destroy(Report $report)
{
    try {
        $taskId = $report->task_id;
        $report->delete();

        return response()->json([
            'success' => true,
            'message' => 'Report deleted successfully!'
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred. Please try again later.',
            'error' => $e->getMessage()
        ], 500);
    }
}public function index(Request $request)
{
    try {
        $perPage = $request->input('per_page', 10); // Default pagination to 10 per page

        $reports = Report::with([
            'task', 
            'admin:id,name' // Load only 'id' and 'name' from admin (hide other fields)
        ])
        ->select('id', 'task_id', 'admin_id', 'reason', 'created_at')
        ->paginate($perPage);

        return response()->json([
            'success' => true,
            'message' => 'Report reterived successfully',
            'data' => $reports->items(), // Return only the paginated items
            'pagination' => [
                'total' => $reports->total(),
                'per_page' => $reports->perPage(),
                'current_page' => $reports->currentPage(),
                'last_page' => $reports->lastPage(),
                'from' => $reports->firstItem(),
                'to' => $reports->lastItem()
            ]
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while fetching reports.',
            'error' => $e->getMessage() 
        ], 500);
    }
}


}
