<?php

namespace NormanHuth\HelpersLaravel\App\Console\Commands\Development;

use Illuminate\Console\Command;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Routing\Router;
use Illuminate\Routing\ViewController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Route;
use NormanHuth\Helpers\Markdown\Table;
use ReflectionClass;

class RoutesSaveCommand extends Command
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
    protected $description = 'Save the `route:list` output to `/storage/app/routes.md` or `/storage/app/{name}.md`';

    /**
     * The router instance.
     *
     * @var \Illuminate\Routing\Router
     */
    protected Router $router;

    public function __construct(Router $router)
    {
        parent::__construct();

        $this->router = $router;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('name');
        $name = $name ?: 'routes';

        $name = $name . '.md';

        $contents = '# Route Export ' . now()->toDateTimeString() . "\n\n";

        $table = new Table();

        $table->addCell('Domain');
        $table->addCell('Name');
        $table->addCell('Uri');
        $table->addCell('Method');
        $table->addCell('Action');
        $table->addCell('Middleware');

        $routes = collect($this->router->getRoutes())->map(function (Route $route) {
            $method = implode('\|', $route->methods());
            $middleware = array_diff($route->middleware(), $route->excludedMiddleware());
            $action = ltrim($route->getActionName(), '\\');
            $name = $route->getName();

            return [
                'domain' => $route->domain(),
                'name' => $name,
                'uri' => '/' . ltrim($route->uri(), '/'),
                'method' => $method == 'GET\|HEAD\|POST\|PUT\|PATCH\|DELETE\|OPTIONS' ? 'ANY' : $method,
                'action' => $this->formatAction($action, $name),
                'middleware' => implode(' \| ', $middleware),
            ];
        })->sortBy(['domain', 'uri']);

        $table->addRows($routes);

        $contents .= $table->render();
        $contents = str_replace('>>>', ' » ', $contents);

        Storage::disk('local')->put($name, trim($contents)."\n");
        $this->info(__('The were saved in the file `:file`', ['file' => Storage::disk('local')->path($name)]));
    }

    /**
     * Get the formatted action.
     * Based on \Illuminate\Foundation\Console\RouteListCommand
     *
     * @param string|null $action
     * @param string|null $name
     *
     * @return string|null
     */
    protected function formatAction(?string $action, ?string $name): ?string
    {
        if ($action === 'Closure' || $action === ViewController::class) {
            return $name;
        }

        $name = $name ? $name . '>>>' : null;

        $rootControllerNamespace = $this->laravel[UrlGenerator::class]->getRootControllerNamespace()
            ?? ($this->laravel->getNamespace() . 'Http\\Controllers');

        if (str_starts_with($action, $rootControllerNamespace)) {
            return $name . substr($action, mb_strlen($rootControllerNamespace) + 1);
        }

        $actionClass = explode('@', $action)[0];

        if (
            class_exists($actionClass) &&
            str_starts_with((new ReflectionClass($actionClass))->getFilename(), base_path('vendor'))
        ) {
            $actionCollection = collect(explode('\\', $action));

            return $name . $actionCollection->take(2)->implode('\\') . '>>>' . $actionCollection->last();
        }

        return $name . $action;
    }
}
