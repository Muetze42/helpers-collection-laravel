<?php

namespace NormanHuth\HelpersLaravel\App\Console\Commands\Development;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class RoutesSave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:save {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save the `route:list` output to `/storage/development/routes.txt` or `/storage/development/{name}.txt`';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('name');
        $name = $name ?: 'routes';

        $name = $name.'.txt';
        Artisan::call('route:list');
        Storage::disk('local')->put($name, Artisan::output());

        $this->info(__('The were saved in the file `:file`', ['name' => $name, 'file' => Storage::disk('local')->path($name)]));
    }
}
