<?php

namespace NormanHuth\HelpersLaravel\App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Translation\PotentiallyTranslatedString;

class DomainTld implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string                                       $attribute
     * @param mixed                                        $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $disk = config('disposable-email.disk', 'local');
        $file = config('disposable-email.file', 'data/tld-list.json');

        if (Storage::disk($disk)->missing($file)) {
            Artisan::call('update:tld-list');
        }

        $tldList = json_decode(Storage::disk($disk)->get($file), true);
        $parts = explode('@', $value);
        $provider = !empty($parts[1]) ? $parts[1] : '';
        $valueParts = explode('.', $provider);
        if (count($valueParts) < 2 || in_array(last($valueParts), $tldList)) {
            $fail('validation.email')->translate();
        }
    }
}
