<?php

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;
use Illuminate\Mail\Markdown;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

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
     * Helper function for logging errors
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
     * Get current batch from a modal
     *
     * @param mixed $model
     * @param string $column
     * @return int
     */
    function getBatch(mixed $model, string $column = 'batch'): int
    {
        $batch = (int)optional($model::orderByDesc($column)->first())->batch;
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

if (!function_exists('paresMarkdown')) {
    /**
     * Parse the given Markdown text string into HTML.
     *
     * @param string $text
     * @return HtmlString
     */
    function paresMarkdown(string $text): HtmlString
    {
        return Markdown::parse($text);
    }
}

if (!function_exists('renderMarkdown')) {
    /**
     * Render the Markdown view template into HTML.
     *
     * @param string $text
     * @param array $data
     * @param CssToInlineStyles|null $inliner
     * @return HtmlString
     */
    function renderMarkdown(string $text, array $data = [], ?CssToInlineStyles $inliner = null): HtmlString
    {
        return Markdown::render($text, $data, $inliner);
    }
}



if (!function_exists('renderMailable')) {
    /**
     * Render Laravel Mailable
     *
     * @param Mailable|string $mailable
     * @throws ReflectionException
     * @return string
     */
    function renderMailable(Mailable|string $mailable): string
    {
        return (new $mailable)->render();
    }
}
