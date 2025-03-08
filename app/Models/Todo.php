<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    protected $fillable = [
        'name',
        'description',
        'priority',
        'status',
        'deadline',
    ];

    protected function casts()
    {
        return [
            'deadline' => 'datetime'
        ];
    }

    public static array $priorities = [
        'low' => 'Niski',
        'medium' => 'Średni',
        'high' => 'Wysoki',
    ];

    public static array $statuses = [
        'toDo' => 'Do zrobienia',
        'inProgress' => 'W trakcie',
        'done' => 'Zakończone',
    ];

    public function expired()
    {
        return ($this->status !== 'done') && $this->deadline->isPast();
    }

    public function getPriority()
    {
        return isset(self::$priorities[$this->priority]) ?
            self::$priorities[$this->priority] :
            'Nieznany';
    }

    public function getStatus()
    {
        return isset(self::$statuses[$this->status]) ?
            self::$statuses[$this->status] :
            'Nieznany';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
