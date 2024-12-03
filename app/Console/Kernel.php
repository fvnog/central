<?php

namespace App\Console;

use App\Jobs\SendCompletedTasksEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new SendCompletedTasksEmailJob())->dailyAt('07:00');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
