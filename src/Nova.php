<?php

namespace NormanHuth\HelpersLaravel;

use Illuminate\Support\Str;

class Nova
{
    /**
     * Decode the filter string from base64 encoding.
     *
     * @param string $filtersRequestString
     * @return array
     */
    public static function decodeFilter(string $filtersRequestString): array
    {
        if (empty($filtersRequestString)) {
            return [];
        }

        $filters = json_decode(base64_decode($filtersRequestString), true);

        return is_array($filters) ? $filters : [];
    }

    /**
     * Check if a Nova (4) filter is active
     *
     * @param $filter
     * @return bool
     */
    public static function isFilterActive($filter): bool
    {
        $filtersRequest = request()->input('filters');

        if (!$filtersRequest) {
            return false;
        }

        $filters = static::decodeFilter($filtersRequest);

        $check = array_filter(array_values($filters), function ($value) use ($filter) {
            return isset($value[$filter]) && $value[$filter] != '';
        });

        return !empty($check);
    }

    /**
     * Create a Nova resource link
     *
     * @param $resource
     * @param int $resourceID
     * @param array|null $queries
     * @return string
     */
    public static function resourceLink($resource, int $resourceID, ?array $queries = null): string
    {
        $path = str_replace('//', '/', '/'.config('nova.path'));

        $query = empty($queries) ? '' : '?'.http_build_query($queries);

        return $path.'/resources/'.Str::plural(Str::kebab(class_basename(class_basename($resource)))).'/'.$resourceID.$query;
    }

    /**
     * Get the path to the base of the Nova installation.
     *
     * @param string|null $path
     * @return string
     */
    public static function url(?string $path = null): string
    {
        if ($path) {
            $path = ltrim($path, '/\\').'/';
        }

        return config('app.url').config('nova.path').$path;
    }
}
