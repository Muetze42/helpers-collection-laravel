<?php

namespace NormanHuth\HelpersLaravel\App\Console\Commands\IdeHelper;

use Illuminate\Console\Command;
use NormanHuth\Helpers\Composer;

class IdeHelperCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'helper';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update `Laravel IDE Helper`';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (config('app.env') !== 'local') {
            $this->warn('The `ide-helper` is only for local development environment');
            return;
        }

        $this->call('ide-helper:models',
            Composer::getLockedVersion('barryvdh/laravel-ide-helper') == 'v2.13.0' ? [
                '--write'   => false,
                '--reset'   => true,
                '--nowrite' => true,
            ] : [
                '--write'   => false,
                '--nowrite' => true,
            ]);
        $this->call('ide-helper:generate');
        $this->call('ide-helper:meta');

        if (class_exists('Tutorigo\LaravelMacroHelper\IdeMacrosServiceProvider')) {
            $this->call('ide-helper:macros');
        }
    }
}
