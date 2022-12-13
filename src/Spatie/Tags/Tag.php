<?php

namespace NormanHuth\HelpersLaravel\Spatie\Tags;

use ArrayAccess;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as DbCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model implements Sortable
{
    use SortableTrait;
    use HasSlug;
    use HasFactory;

    public $guarded = [];

    public function scopeWithType(Builder $query, string $type = null): Builder
    {
        if (is_null($type)) {
            return $query;
        }

        return $query->where('type', $type)->ordered();
    }

    public function scopeContaining(Builder $query, string $name, $locale = null): Builder
    {
        return $query->where('name', 'LIKE', '%'.mb_strtolower($name).'%');
    }

    public static function findOrCreate(
        string|array|ArrayAccess $values,
        string|null              $type = null,
        string|null              $locale = null,
    ): Collection|Tag|static
    {
        $tags = collect($values)->map(function ($value) use ($type, $locale) {
            if ($value instanceof self) {
                return $value;
            }

            return static::findOrCreateFromString($value, $type, $locale);
        });

        return is_string($values) ? $tags->first() : $tags;
    }

    public static function getWithType(string $type): DbCollection
    {
        return static::withType($type)->get();
    }

    public static function findFromString(string $name, string $type = null, string $locale = null)
    {
        return static::query()
            ->where('name', $name)
            ->where('type', $type)
            ->first();
    }

    public static function findFromStringOfAnyType(string $name, string $locale = null)
    {
        return static::query()
            ->where('name', $name)
            ->get();
    }

    protected static function findOrCreateFromString(string $name, string $type = null, string $locale = null)
    {
        $tag = static::findFromString($name, $type, $locale);

        if (!$tag) {
            $tag = static::create([
                'name' => $name,
                'type' => $type,
            ]);
        }

        return $tag;
    }

    public static function getTypes(): Collection
    {
        return static::groupBy('type')->pluck('type');
    }
}
