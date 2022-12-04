<?php

namespace NormanHuth\HelpersLaravel\App\Http\Resources\Json;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource as BaseResource;
use JsonSerializable;

class JsonResource extends BaseResource
{
    /**
     * Optional: Set a key name to add a simple route in the resource array
     *
     * @var string|null
     */
    protected ?string $addSimpleShowRoute = null;

    /**
     * Create a new anonymous resource collection.
     *
     * @param mixed $resource
     * @return AnonymousResourceCollection
     */
    public static function collection($resource): AnonymousResourceCollection
    {
        return tap(new AnonymousResourceCollection($resource, static::class), function ($collection) {
            if (property_exists(static::class, 'preserveKeys')) {
                $collection->preserveKeys = (new static([]))->preserveKeys === true;
            }
        });
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        $array = parent::toArray($request);

        if ($this->addSimpleShowRoute && method_exists($request, 'getPathInfo')) {
            $path = $request->getPathInfo();
            $showPath = '/'.$this->getRouteKey();
            if (!str_ends_with($path,$showPath)) {
                return array_merge($array, [$this->addSimpleShowRoute => url($request->getPathInfo()).$showPath]);
            }
        }

        return $array;
    }
}
