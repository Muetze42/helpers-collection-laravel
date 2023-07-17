<?php

namespace NormanHuth\HelpersLaravel\Traits\Spatie;

use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

trait LogsActivityTrait
{
    use LogsActivity;

    protected function getDontLogIfAttributesChangedOnly(): array
    {
        return array_merge([
            'created_at',
            'updated_at',
        ], $this->hidden);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logExcept(array_merge([
                'created_at',
                'updated_at',
            ], $this->hidden))
            ->dontLogIfAttributesChangedOnly($this->getDontLogIfAttributesChangedOnly())
            ->logOnlyDirty()
            ->useLogName($this->getLogName());
    }

    protected function getLogName(): string
    {
        return $this->formatLogName(get_class($this));
    }

    protected function formatLogName(string $class): string
    {
        $className = Str::kebab(class_basename($class));

        return Str::plural(explode('-', $className)[0]);
    }
}
