<?php

namespace App\Src\Shared\Infrastructure\Providers;

use App\Src\BoundedContext\Pouch\Domain\Contracts\PouchRepository;
use App\Src\BoundedContext\Pouch\Infrastructure\Commands\PouchSynchronizeCommand;
use App\Src\BoundedContext\Pouch\Infrastructure\Repositories\PouchEloquentRepository;
use Illuminate\Support\ServiceProvider;

class SourceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadViewsFrom($this->basePath('Resources/views/'), 'views');

        $this->app->bind(PouchRepository::class, function () {
            return new PouchEloquentRepository;
        });
    }

    public function boot(): void
    {
        $migrationPath = $this->basePath('Database/migrations/');
        $seederPath = $this->basePath('Database/seeders/DatabaseSeeder.php');
        $assetsPath = $this->basePath('Resources/assets');

        $this->publishes([$seederPath => database_path('seeders/DatabaseSeeder.php')], 'demo-seeders');
        $this->publishes([$assetsPath => base_path('public/assets')], 'demo-assets');

        $this->loadMigrationsFrom($migrationPath);

        $this->commands([
            PouchSynchronizeCommand::class
        ]);
    }

    protected function basePath($path = ''): string
    {
        return base_path(sprintf('src/Shared/Infrastructure/%s', $path));
    }
}
