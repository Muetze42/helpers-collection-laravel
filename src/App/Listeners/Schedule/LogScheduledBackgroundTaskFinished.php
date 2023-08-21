<?php

namespace NormanHuth\HelpersLaravel\App\Listeners\Schedule;

use Illuminate\Console\Events\ScheduledBackgroundTaskFinished;
use Illuminate\Support\Facades\Log;

/**
 * Listener of \Illuminate\Console\Events\ScheduledBackgroundTaskFinished
 */
class LogScheduledBackgroundTaskFinished
{
    /**
     * Handle the event.
     *
     * @param ScheduledBackgroundTaskFinished $event
     *
     * @return void
     */
    public function handle(ScheduledBackgroundTaskFinished $event): void
    {
        $infos = [
            'ScheduledBackgroundTaskFinished',
            $event->task->command,
            'output: ' . $event->task->output,
            'exitCode: ' . $event->task->exitCode,
            'memory: ' . memory_get_usage(true),
        ];

        $channel = config('logging.schedule');

        if (!$channel) {
            $channel = config('logging.default', 'daily');
        }

        Log::channel($channel)->info(implode(' | ', $infos));
    }
}
