<?php

namespace NormanHuth\HelpersLaravel;

class Models
{
    public static function getBatch(mixed $model, string $column = 'batch'): int
    {
        $batch = (int) optional($model::orderByDesc($column)->first())->batch;
        $batch++;

        return $batch;
    }
}
