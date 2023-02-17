<?php

namespace NormanHuth\HelpersLaravel\App\Http\Resources\Json;

use Illuminate\Http\Resources\Json\PaginatedResourceResponse as BaseResourceResponse;
use Illuminate\Support\Arr;

class PaginatedResourceResponse extends BaseResourceResponse
{
    /**
     * Gather the metadata for the response.
     *
     * @param array $paginated
     * @return array
     */
    protected function meta($paginated): array
    {
        return Arr::except($paginated, [
            'links',
            'data',
            'first_page_url',
            'last_page_url',
            'prev_page_url',
            'next_page_url',
        ]);
    }
}
