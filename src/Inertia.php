<?php

namespace NormanHuth\HelpersLaravel;

class Inertia
{
    /**
     * Add a piece of shared data to the environment and Inertia request.
     *
     * @param array|string $key
     * @param mixed|null   $value
     */
    public static function fullShare(array|string $key, mixed $value = null): void
    {
        view()->share($key, $value);
        \Inertia\Inertia::share($key, $value);
    }
}
