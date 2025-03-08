<?php

namespace App\Jobs;

use App\Models\Todo;
use App\Notifications\DeadlineReminder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class SendDeadlineReminder implements ShouldQueue
{
    use SerializesModels, Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected Todo $todo
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->todo->user->notify(new DeadlineReminder($this->todo));
    }
}
