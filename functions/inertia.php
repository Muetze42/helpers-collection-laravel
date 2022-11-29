<?php

use NormanHuth\HelpersLaravel\Inertia;

if (!function_exists('inertiaFullShare')) {
    /**
     * Add a piece of shared data to the environment and Inertia request.
     *
     * @param array|string $key
     * @param mixed|null $value
     */
    function inertiaFullShare(array|string $key, mixed $value = null): void
    {
        Inertia::fullShare($key, $value);
    }
}
