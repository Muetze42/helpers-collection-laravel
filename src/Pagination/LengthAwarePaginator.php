<?php

namespace NormanHuth\HelpersLaravel\Pagination;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class LengthAwarePaginator extends Paginator
{
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'current_page'   => $this->currentPage(),
            'data'           => $this->items->toArray(),
            'first_page_url' => $this->url(1),
            'from'           => $this->firstItem(),
            'last_page'      => $this->lastPage(),
            'last_page_url'  => $this->url($this->lastPage()),
//            'links'          => $this->linkCollection()->toArray(),
            'next_page_url'  => $this->nextPageUrl(),
            'path'           => $this->path(),
            'per_page'       => $this->perPage(),
            'prev_page_url'  => $this->previousPageUrl(),
            'to'             => $this->lastItem(),
            'total'          => $this->total(),
        ];
    }
}
