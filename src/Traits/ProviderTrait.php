<?php

namespace NormanHuth\HelpersLaravel\Traits;

trait ProviderTrait
{
    protected function addHashToAssetUrl(): void
    {
        $this->app->extend('url', function (\Illuminate\Routing\UrlGenerator $urlGenerator) {
            return new \App\Facades\UrlGenerator(
                $this->app->make('router')->getRoutes(),
                $urlGenerator->getRequest(),
                $this->app->make('config')->get('app.asset_url')
            );
        });
    }
}
