<?php

namespace NormanHuth\HelpersLaravel;

use Illuminate\Support\ServiceProvider as Provider;
use NormanHuth\Helpers\Exception\FileNotFoundException;

class ServiceProvider extends Provider
{
    /**
     * Bootstrap any package services.
     *
     * @throws FileNotFoundException
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../stubs' => base_path('stubs'),
        ], 'stubs');

        if ($this->app->runningInConsole()) {
            $this->commands($this->getCommands());
            $this->commands($this->getCommands('Development'));

            if (class_exists('Laravel\Nova\Nova')) {
                $this->commands($this->getCommands('Nova'));
            }

            if (class_exists('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider')) {
                $this->commands($this->getCommands('IdeHelper'));
            }
        }
    }

    /**
     * Get all package commands
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
