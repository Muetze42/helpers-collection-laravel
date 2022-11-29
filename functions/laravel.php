<?php

use Illuminate\Support\Facades\Log;

if (!function_exists('appLog')) {
    /**
     * Helper function for logging
     *
     * @param mixed $message
     * @param string $level
     * @param string|null $channel
     * @param array $context
     */
    function appLog(mixed $message, string $level = 'debug', ?string $channel = null, array $context = []): void
    {
        if (!$channel) {
            $channels = config('logging.channels');
            if (isset($channels[$level])) {
                $channel = $level;
            }
            if (!$channel) {
                $channel = config('logging.default', 'daily');
            }
        }
        $message = formatLogMessage($message);

        Log::channel($channel)->{$level}($message, $context);
    }
}

if (!function_exists('errorLog')) {
    /**
     * Helper function to logging errors
     *
     * @param $message
     * @param array $context
     * @param string|null $channel
     * @return void
     */
    function errorLog($message, array $context = [], ?string $channel = null): void
    {
        appLog($message, 'error', $channel, $context);
    }
}

if (!function_exists('getBatch')) {
    /**
     * Get current bat from table
     *
     * @param mixed $model
     * @param string $column
     * @return int
     */
    function getBatch(mixed $model, string $column = 'batch'): int
    {
        $batch = (int) optional($model::orderByDesc($column)->first())->batch;
        $batch++;

        return $batch;
    }
}

if (!function_exists('formatLogMessage')) {
    /**
     * „Stringify“ objects and arrays
     *
     * @param mixed $message
     * @return mixed|string
     */
    function formatLogMessage(mixed $message): mixed
    {
        if (is_array($message) || is_object($message)) {
            $prefix = is_array($message) ? 'array' : 'object';

            return $prefix.' '.json_encode($message, JSON_UNESCAPED_UNICODE); // Todo: Testing
        }

        return $message;
    }
}

