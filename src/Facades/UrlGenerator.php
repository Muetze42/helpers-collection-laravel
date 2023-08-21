<?php

namespace NormanHuth\HelpersLaravel\Facades;

use Illuminate\Routing\UrlGenerator as Generator;

class UrlGenerator extends Generator
{
    /**
     * Generate the URL to an application asset.
     *
     * @param string    $path
     * @param bool|null $secure
     *
     * @return string
     */
    public function asset($path, $secure = null): string
    {
        if ($this->isValidUrl($path)) {
            return $path;
        }

        // Once we get the root URL, we will check to see if it contains an index.php
        // file in the paths. If it does, we will remove it since it is not needed
        // for asset paths, but only for routes to endpoints in the application.
        $root = $this->assetRoot ?: $this->formatRoot($this->formatScheme($secure));

        $file = public_path($path);
        if (!str_starts_with(trim($path, '\\/'), 'build/') && file_exists($file)) {
            $path .= str_ends_with($path, '?') ? '&' : '?';
            $path .= 'v=' . md5_file($file);
        }

        return $this->removeIndex($root) . '/' . $path;
    }
}
