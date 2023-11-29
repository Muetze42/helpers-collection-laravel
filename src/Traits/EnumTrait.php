<?php

namespace NormanHuth\HelpersLaravel\Traits;

use Illuminate\Support\Arr;

trait EnumTrait
{
    /**
     * Return name value array.
     *
     * @return array<string, string>
     */
    public static function toOptionsArray(): array
    {
        return Arr::mapWithKeys(self::cases(), function (self $enum) {
            return [$enum->name => $enum->value];
        });
    }

    /**
     * Return value label array.
     *
     * @return array<string, string>
     */
    public static function toValueLabelArray(): array
    {
        return Arr::mapWithKeys(self::cases(), function (self $enum) {
            $label = method_exists($enum, 'label') ? $enum->label() : $enum->value;

            return [$enum->value => __($label)];
        });
    }
}
