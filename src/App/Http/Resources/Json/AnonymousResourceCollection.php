<?php

namespace NormanHuth\HelpersLaravel\App\Http\Resources\Json;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection as BaseCollection;

class AnonymousResourceCollection extends BaseCollection
{
    /**
     * Create a paginate-aware HTTP response.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    protected function preparePaginatedResponse($request): JsonResponse
    {
        if ($this->preserveAllQueryParameters) {
            $this->resource->appends($request->query());
        } elseif (!is_null($this->queryParameters)) {
            $this->resource->appends($this->queryParameters);
        }

        return (new PaginatedResourceResponse($this))->toResponse($request);
    }
}
