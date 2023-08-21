<?php

namespace NormanHuth\HelpersLaravel;

class Translator
{
    /**
     * Get all JSON translation.
     *
     * @param string|null $locale
     * @param string      $group
     * @param string|null $namespace
     *
     * @return array
     */
    public static function getJsonTranslations(
        string $locale = null,
        string $group = '*',
        ?string $namespace = '*'
    ): array {
        if (!$locale) {
            $locale = app()->getLocale();
        }

        $loader = app('translator')->getLoader();

        return $loader->load($locale, $group, $namespace);
    }

    /**
     * Add new JSON paths include child paths to the translation file loader.
     *
     * @param array|string $paths
     *
     * @return void
     */
    public static function loadJsonTranslationsFrom(array|string $paths): void
    {
        $paths = (array) $paths;

        foreach ($paths as $path) {
            $path = rtrim($path, '\\/');
            app('translator')->addJsonPath($path);
            foreach (glob($path . '/*', GLOB_ONLYDIR) as $childPath) {
                self::loadJsonTranslationsFrom($childPath);
            }
        }
    }
}
