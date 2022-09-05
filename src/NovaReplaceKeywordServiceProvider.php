<?php

declare(strict_types=1);

namespace Joy\NovaReplaceKeyword;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Joy\NovaReplaceKeyword\Console\Commands\Install;
use Joy\NovaReplaceKeyword\Console\Commands\ReplaceKeyword;

/**
 * Class NovaReplaceKeywordServiceProvider
 *
 * @category  Package
 * @package   JoyNovaReplaceKeyword
 * @author    Ramakant Gangwar <gangwar.ramakant@gmail.com>
 * @copyright 2021 Copyright (c) Ramakant Gangwar (https://github.com/rxcod9)
 * @license   http://github.com/rxcod9/joy-nova-replace-keyword/blob/main/LICENSE New BSD License
 * @link      https://github.com/rxcod9/joy-nova-replace-keyword
 */
class NovaReplaceKeywordServiceProvider extends ServiceProvider
{
    /**
     * Boot
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPublishables();

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'joy-nova-replace-keyword');

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'joy-nova-replace-keyword');
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../routes/web.php');
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix(config('joy-nova-replace-keyword.route_prefix', 'api'))
            ->middleware('api')
            ->group(__DIR__ . '/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/nova-replace-keyword.php', 'joy-nova-replace-keyword');

        if ($this->app->runningInConsole()) {
            $this->registerCommands();
        }
    }

    /**
     * Register publishables.
     *
     * @return void
     */
    protected function registerPublishables(): void
    {
        $this->publishes([
            __DIR__ . '/../config/nova-replace-keyword.php' => config_path('joy-nova-replace-keyword.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/joy-nova-replace-keyword'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/joy-nova-replace-keyword'),
        ], 'translations');
    }

    protected function registerCommands(): void
    {
        $this->app->singleton('command.joy.nova.replace-keyword', function () {
            return new ReplaceKeyword();
        });

        $this->app->singleton('command.joy.nova.replace-keyword.install', function () {
            return new Install();
        });

        $this->commands([
            'command.joy.nova.replace-keyword',
            'command.joy.nova.replace-keyword.install',
        ]);
    }
}
