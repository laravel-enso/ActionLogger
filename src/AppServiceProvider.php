<?php

namespace LaravelEnso\ActionLogger;

use Illuminate\Support\ServiceProvider;
use LaravelEnso\ActionLogger\DynamicRelations\ActionLogs;
use LaravelEnso\ActionLogger\Http\Middleware\ActionLogger;
use LaravelEnso\DynamicMethods\Services\Methods;
use LaravelEnso\Users\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app['router']->aliasMiddleware('action-logger', ActionLogger::class);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        Methods::bind(User::class, [ActionLogs::class]);
    }
}
