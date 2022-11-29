<?php

namespace NormanHuth\HelpersLaravel\App\Listeners\Schedule;

use Illuminate\Console\Events\ScheduledTaskFinished;
use Illuminate\Support\Facades\Log;

/**
 * Listener for \Illuminate\Console\Events\ScheduledTaskFinished
 */
class LogScheduledTaskFinished
{
    /**
     * Handle the event.
     *
     * @param ScheduledTaskFinished $event
     * @return void
     */
    public function handle(ScheduledTaskFinished $event): void
    {
        $infos = [
            'ScheduledTaskFinished',
            $event->task->command,
            'exitCode: '.$event->task->exitCode,
            'output: '.$event->task->output,
            'memory: '.memory_get_usage(true),
        ];

        $channel = config('logging.schedule');

        if (!$channel) {
            $channel = config('logging.default', 'daily');
        }

        Log::channel($channel)->info(implode(' | ', $infos));
    }
}
