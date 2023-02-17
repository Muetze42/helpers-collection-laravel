<?php

namespace NormanHuth\HelpersLaravel\Support;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Arr;

class LengthAwarePaginator extends Paginator
{
    /**
     * Get the URL for a given page number.
     *
     * @param int $page
     * @return string
     */
    public function url($page): string
    {
        if ($page <= 0) {
            $page = 1;
        }

        // If we have any extra query string key / value pairs that need to be added
        // onto the URL, we will put them in query string form and then attach it
        // to the URL. This allows for extra information like sorting storage.
        $parameters = [$this->pageName => $page];

        if (count($this->query) > 0) {
            $parameters = array_merge($this->query, $parameters);
        }

        if (!empty($parameters[$this->pageName]) && $parameters[$this->pageName] == 1) {
            unset($parameters[$this->pageName]);
        };

        return $this->path()
            .(str_contains($this->path(), '?') ? '&' : '?')
            .Arr::query($parameters)
            .$this->buildFragment();
    }
}
