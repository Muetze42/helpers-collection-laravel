<?php

namespace NormanHuth\HelpersLaravel\App\Rules;

use Closure;
use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Translation\PotentiallyTranslatedString;
use NormanHuth\Helpers\Str;

class DisposableEmail implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param string                                       $attribute
     * @param mixed                                        $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail): void
    {
        $disk = config('disposable-email.disk', 'local');
        $file = config('disposable-email.file', 'data/disposable-emails.json');

        if (Storage::disk($disk)->missing($file)) {
            Artisan::call('update:disposable-emails');
        }

        $providers = json_decode(Storage::disk($disk)->get($file), true);
        $value = Str::lower(trim($value));
        $parts = explode('@', $value);
        if (empty($parts[1]) || in_array($parts[1], $providers)) {
            $fail(__('This Email provider is not allowed.'));
        }
    }
}
