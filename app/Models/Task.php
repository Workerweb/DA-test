<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TaskStatus;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status', 'importance', 'deadline'
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'status' => TaskStatus::class,
    ];

    protected $appends = ['priority_score', 'is_overdue'];

    public function getPriorityScoreAttribute(): float
    {
        $daysUntilDeadline = now()->diffInDays($this->deadline, false);

        return $daysUntilDeadline > 0
            ? $this->importance * (1 / $daysUntilDeadline)
            : 0;
    }

    public function getIsOverdueAttribute(): bool
    {
        return now()->greaterThan($this->deadline);
    }
}
