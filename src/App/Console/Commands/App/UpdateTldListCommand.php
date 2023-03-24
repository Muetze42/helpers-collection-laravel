<?php

namespace NormanHuth\HelpersLaravel\App\Console\Commands\App;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use NormanHuth\Helpers\Str;

class UpdateTldListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:tld-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update tld list';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $disk = config('disposable-email.disk', 'local');
        $file = config('disposable-email.file', 'data/tld-list.json');
        set_time_limit(0);
        $content = file_get_contents('https://data.iana.org/TLD/tlds-alpha-by-domain.txt');
        $content = explode("\n", $content);
        unset($content[0]);
        $content = array_map('strtolower', $content);
        Storage::disk($disk)->put($file, Str::jsonPrettyEncode(array_values($content)));
    }
}
