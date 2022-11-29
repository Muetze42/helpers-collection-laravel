<?php

namespace NormanHuth\HelpersLaravel\App\Listeners\Schedule;

use Illuminate\Console\Events\ScheduledTaskFailed;
use Illuminate\Support\Facades\Log;

/**
 * Listener for \Illuminate\Console\Events\ScheduledTaskFailed
 */
class LogScheduledTaskFailed
{
    /**
     * Handle the event.
     *
     * @param ScheduledTaskFailed $event
     * @return void
     */
    public function handle(ScheduledTaskFailed $event): void
    {
        $infos = [
            'ScheduledTaskFailed',
            $event->task->command,
            'exitCode: '.$event->task->exitCode,
            'message: '.optional($event->exception)->getMessage(),
            'memory: '.memory_get_usage(true),
        ];

        $channel = config('logging.schedule');

        if (!$channel) {
            $channel = config('logging.default', 'daily');
        }

        Log::channel($channel)->info(implode(' | ', $infos));
    }
}
