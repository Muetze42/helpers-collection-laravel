<?php

namespace NormanHuth\HelpersLaravel\Macros;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

trait CollectionTrait
{
    /**
     * @return void
     */
    protected function addToValueLabel(): void
    {
        Collection::macro('toValueLabel', function () {
            $items = $this->map(fn($value) => $value instanceof Arrayable ? $value->toArray() : $value)->all();

            return array_values(Arr::map($items, function ($value, $key) {
                return [
                    'value' => $value,
                    'label' => $key,
                ];
            }));
        });
    }
}
