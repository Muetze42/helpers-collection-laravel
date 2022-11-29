<?php

namespace NormanHuth\HelpersLaravel\App\Listeners\Schedule;

use Illuminate\Console\Events\ScheduledTaskStarting;
use Illuminate\Support\Facades\Log;

/**
 * Listener for \Illuminate\Console\Events\ScheduledTaskStarting
 */
class LogScheduledTaskStarting
{
    /**
     * Handle the event.
     *
     * @param ScheduledTaskStarting $event
     * @return void
     */
    public function handle(ScheduledTaskStarting $event): void
    {
        $infos = [
            'ScheduledTaskStarting',
            $event->task->command,
            'expression: '.$event->task->expression,
        ];

        $channel = config('logging.schedule');

        if (!$channel) {
            $channel = config('logging.default', 'daily');
        }

        Log::channel($channel)->info(implode(' | ', $infos));
    }
}
