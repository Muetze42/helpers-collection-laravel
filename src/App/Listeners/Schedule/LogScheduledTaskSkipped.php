<?php

namespace NormanHuth\HelpersLaravel\App\Listeners\Schedule;

use Illuminate\Console\Events\ScheduledTaskSkipped;
use Illuminate\Support\Facades\Log;

/**
 * Listener for \Illuminate\Console\Events\ScheduledTaskSkipped
 */
class LogScheduledTaskSkipped
{
    /**
     * Handle the event.
     *
     * @param ScheduledTaskSkipped $event
     * @return void
     */
    public function handle(ScheduledTaskSkipped $event): void
    {
        $infos = [
            'ScheduledTaskSkipped',
            $event->task->command,
        ];

        $channel = config('logging.schedule');

        if (!$channel) {
            $channel = config('logging.default', 'daily');
        }

        Log::channel($channel)->info(implode(' | ', $infos));
    }
}
