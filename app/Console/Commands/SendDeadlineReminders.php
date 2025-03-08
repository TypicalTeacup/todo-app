<?php

namespace App\Console\Commands;

use App\Jobs\SendDeadlineReminder;
use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendDeadlineReminders extends Command
{
    protected $signature = 'app:send-deadline-reminders';
    protected $description = 'Send reminders for todos due tomorrow';

    public function handle()
    {
        $tomorrow = Carbon::tomorrow();

        $todos = Todo::whereNot('status', 'done')
            ->whereDate('deadline', $tomorrow)
            ->get();

        foreach ($todos as $todo) {
            SendDeadlineReminder::dispatch($todo);
        }
    }
}
