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
}
