<?php

namespace NormanHuth\HelpersLaravel\Macros;

use Illuminate\Support\Carbon;

trait CarbonLaravelTrait
{
    /**
     * @return void
     */
    protected function addUserTimezone(): void
    {
        Carbon::macro('public', function () {
            return Carbon::timezone(config('app.user_timezone', 'Europe/Berlin'));
        });
    }

    /**
     * @return void
     */
    protected function addUserTimezoneFormatted(): void
    {
        Carbon::macro('publicFormatted', function (?string $format = null) {
            if (!$format) {
                $format = config('app.formats.date-time', 'd.m.Y, G:i');
            }
            return Carbon::timezone(config('app.user_timezone', 'Europe/Berlin'))
                ->format($format);
        });
    }
}
