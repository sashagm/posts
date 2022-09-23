<?php

namespace Sashagm\Posts\Providers;

use Illuminate\Support\ServiceProvider;
use Sashagm\Posts\Console\Commands\PostCommand;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/posts.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'posts');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/posts'),
        ]);

        $this->publishes([
            __DIR__.'/../config/posts.php' => config_path('posts.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                PostCommand::class,
            ]);
        }
    }
}
