<?php

use NormanHuth\HelpersLaravel\Nova;

if (!function_exists('novaDecodeFilter')) {
    /**
     * Decode the filter string from base64 encoding.
     *
     * @param string $filtersRequestString
     * @return array
     */
    function novaDecodeFilter(string $filtersRequestString): array
    {
        return Nova::decodeFilter($filtersRequestString);
    }
}

if (!function_exists('novaIsFilterActive')) {
    /**
     * Check if a Nova (4) filter is active
     *
     * @param $filter
     * @return bool
     */
    function novaIsFilterActive($filter): bool
    {
        return Nova::isFilterActive($filter);
    }
}

if (!function_exists('novaResourceLink')) {
    /**
     * Create a Nova resource link
     *
     * @param $resource
     * @param int $resourceID
     * @param array|null $queries
     * @return string
     */
    function novaResourceLink($resource, int $resourceID, ?array $queries = null): string
    {
        return Nova::resourceLink($resource, $resourceID, $queries);
    }
}

if (!function_exists('novaUrl')) {
    /**
     * Get the path to the base of the Nova installation.
     *
     * @param string|null $path
     * @return string
     */
    function novaUrl(?string $path = null): string
    {
        return Nova::url($path);
    }
}
