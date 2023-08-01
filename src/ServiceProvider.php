<?php

namespace NormanHuth\HelpersLaravel;

use Illuminate\Support\ServiceProvider as Provider;
use NormanHuth\Helpers\Exception\FileNotFoundException;
use NormanHuth\Helpers\Str;

class ServiceProvider extends Provider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/helpers-collection.php', 'helpers-collection'
        );
    }

    /**
     * Bootstrap any package services.
     *
     * @throws FileNotFoundException
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/helpers-collection.php' => config_path('helpers-collection.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../stubs' => base_path('stubs'),
        ], 'stubs');

        if ($this->app->runningInConsole()) {
            $this->registerCommands();
            $this->registerConfiguredCommands();
        }
    }

    /**
     * Register the package's custom Artisan commands.
     *
     * @return void
     */
    protected function registerCommands(): void
    {
        $this->commands($this->getCommands());
        $this->commands($this->getCommands('Development'));

        if (class_exists('Laravel\Nova\Nova')) {
            $this->commands($this->getCommands('Nova'));
        }

        if (class_exists('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider')) {
            $this->commands($this->getCommands('IdeHelper'));
        }
    }

    /**
     * Register the package's configured custom Artisan commands.
     *
     * @return void
     */
    protected function registerConfiguredCommands(): void
    {
        $commands = array_filter(config('helpers-collection.commands', []));

        if (count($commands)) {
            $commands = array_map(function ($command) {
                return '\\'.__NAMESPACE__.'\\Commands\\'.Str::studly($command);
            }, array_keys($commands));

            $this->commands($commands);
        }
    }

    /**
     * Get package's custom Artisan commands.
     *
     * @param string $directory
     * @return array
     */
    protected function getCommands(string $directory = 'App'): array
    {
        return array_filter(array_map(function ($item) use ($directory) {
            return '\\'.__NAMESPACE__.'\\App\\Console\\Commands\\'.$directory.'\\'.pathinfo($item, PATHINFO_FILENAME);
        }, glob(__DIR__.'/App/Console/Commands/'.$directory.'/*.php')), function ($item) {
            return class_basename($item) != 'Command';
        });
    }
}
