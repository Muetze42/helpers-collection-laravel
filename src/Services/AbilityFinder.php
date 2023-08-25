<?php

namespace NormanHuth\HelpersLaravel\Services;

use NormanHuth\Helpers\Str;
use ReflectionClass;
use Symfony\Component\Finder\Finder;

class AbilityFinder
{
    /**
     * The abilities array.
     *
     * @var array
     */
    protected array $abilities = [];

    /**
     * The methods to scan for.
     *
     * @var array
     */
    protected array $scanFor;

    /**
     * Determined wildcard.
     *
     * @var string|null
     */
    protected ?string $wildcard;

    protected function __construct(array $scanFor, ?string $wildcard)
    {
        $this->scanFor = $scanFor;
        $this->wildcard = $wildcard;
    }

    /**
     * Scan a directory.
     *
     * @param string $directory
     *
     * @throws \ReflectionException
     * @return void
     */
    protected function scanDirectory(string $directory): void
    {
        $files = Finder::create()->files()->in($directory)->name('*.php');

        foreach ($files as $file) {
            $contents = file($file);
            $class = $this->getNamespace($contents) . '\\' . substr(basename($file), 0, -4);
            $this->scanClass($class, $contents);
        }

        $directories = glob($directory . '/*', GLOB_ONLYDIR);
        foreach ($directories as $directory) {
            $this->scanDirectory($directory);
        }
    }

    /**
     * Scan a class file.
     *
     * @param string $class
     * @param array  $contents
     *
     * @throws \ReflectionException
     * @return void
     */
    protected function scanClass(string $class, array $contents): void
    {
        $reflector = new ReflectionClass($class);
        $methods = $reflector->getMethods();

        foreach ($methods as $method) {
            /* @var \ReflectionMethod $method */
            $methodContent = '';
            for ($i = $method->getStartLine(); $i <= $method->getEndLine(); $i++) {
                $methodContent .= $contents[$i] . "\n";
            }

            $methodContent = Str::stripPhpComments($methodContent);
            $methodContent = trim($methodContent);

            foreach ($this->scanFor as $item) {
                preg_match_all('/' . $item . '\((.*?)\)/im', $methodContent, $matches);

                foreach ($matches[1] as $match) {
                    $ability = substr(trim($match), 1, -1);
                    if (!in_array($ability, $this->abilities)) {
                        $this->abilities[] = $ability;
                    }
                    if (!is_null($this->wildcard)) {
                        $ability = explode(':', $ability);
                        if (!empty($ability[1])) {
                            $ability = $ability[0] . $this->wildcard;
                            if (!in_array($ability, $this->abilities)) {
                                $this->abilities[] = $ability;
                            }
                        }
                    }
                }
            }
        }

        sort($this->abilities);
    }

    /**
     * Get namespace of a class file.
     *
     * @param array $contents
     *
     * @return string
     */
    protected function getNamespace(array $contents): string
    {
        $preg = preg_grep('/^namespace /', $contents);
        $namespaceLine = array_shift($preg);
        $match = [];
        preg_match('/^namespace (.*);$/', $namespaceLine, $match);

        return last($match);
    }

    /**
     * Find abilities in all classes in a specific directory and subdirectories.
     *
     * @param string|null $directory
     * @param array|null  $scanFor
     * @param string|null $wildcard
     *
     * @throws \ReflectionException
     * @return array
     */
    public static function findAbilities(?string $directory = null, ?array $scanFor = null, string $wildcard = null): array
    {
        if (!$directory) {
            $directory = app_path('Policies');
        }

        if (is_null($scanFor)) {
            $scanFor = ['tokenCan'];
        }

        $directory = rtrim($directory, '/\\');

        $instance = new self($scanFor, $wildcard);

        $instance->scanDirectory($directory);

        return $instance->abilities;
    }
}
