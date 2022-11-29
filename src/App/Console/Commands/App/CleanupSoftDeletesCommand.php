<?php

namespace NormanHuth\HelpersLaravel\App\Console\Commands\App;

use Illuminate\Console\Command;

class CleanupSoftDeletesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanup:soft-deletes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete finally soft deletes Model instances';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $files = app_path('Models/*.php');
        $days = config('app.soft-deletes-cleanup-hours', 8760);

        foreach (glob($files) as $file) {
            $class = 'App\\Models\\'.basename(str_replace('.php', '', $file));
            $model = app($class);
            if (in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($model))) {
                $this->line(__('Cleanup `:model` soft deletes', ['model' => class_basename($class)]));
                $model::onlyTrashed()->where('deleted_at', '<=', now()->subHours($days))->forceDelete();
            }
        }

        return 0;
    }
}
