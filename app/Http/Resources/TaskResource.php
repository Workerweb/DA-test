<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="Task",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="title", type="string"),
 *     @OA\Property(property="description", type="string"),
 *     @OA\Property(property="status", type="string", enum={"TODO", "IN_PROGRESS", "COMPLETED"}),
 *     @OA\Property(property="importance", type="integer"),
 *     @OA\Property(property="deadline", type="string", format="date-time"),
 *     @OA\Property(property="is_overdue", type="boolean"),
 *     @OA\Property(property="priority_score", type="number", format="float"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time"),
 * )
 */
class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'importance' => $this->importance,
            'deadline' => $this->deadline,
            'is_overdue' => $this->is_overdue,
            'priority_score' => $this->priority_score,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
