<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
            'status' => $this->status,
            'due_date' => $this->due_date,
            'taskimage' => $this->taskimage ? asset('storage/' . $this->taskimage) : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],
            'notes' => $this->notes->map(function ($note) {
                return [
                    'id' => $note->id,
                    'content' => $note->content,
                    'created_at' => $note->created_at,
                ];
            }),
            // Add the reports relationship
            'reports' => $this->whenLoaded('reports', function () {
                return $this->reports->map(function ($report) {
                    return [
                        'id' => $report->id,
                        'task_id' => $report->task_id,
                        'admin_id' => $report->admin_id,
                        'reason' => $report->reason,
                        'created_at' => $report->created_at,
                        'admin' => $report->admin ? [
                            'id' => $report->admin->id,
                            'name' => $report->admin->name,
                        ] : null,
                    ];
                });
            }),
        ];
    }
}
