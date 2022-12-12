<?php

namespace NormanHuth\HelpersLaravel\Spatie\Tags;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    public static function bootHasSlug()
    {
        static::saving(function (Model $model) {
            $slugger = config('tags.slugger');
            $slugger ??= '\Illuminate\Support\Str::slug';
            $slug = call_user_func($slugger, $model->name);
            $model->slug = $slug;
        });
    }
}
