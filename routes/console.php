<?php

use App\Console\Commands\SendDeadlineReminders;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command(SendDeadlineReminders::class)->daily();
