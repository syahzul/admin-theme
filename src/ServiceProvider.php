<?php

namespace Syahzul\AdminTheme;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishPublicAssets();
        $this->publishViews();
        $this->publishResourceAssets();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Publish package views to Laravel project
     *
     * @return void
     */
    private function publishViews()
    {
        $this->loadViewsFrom( dirname(__FILE__) . '/../resources/views/', 'admintheme');

        $this->publishes([
            dirname(__FILE__) . '/resources/views/auth' => base_path('resources/views/auth'),
            dirname(__FILE__) . '/resources/views/errors' => base_path('resources/views/errors'),
            dirname(__FILE__) . '/resources/views/partials' => base_path('resources/views/partials'),
            dirname(__FILE__) . '/resources/views/layouts/app.blade.php' => base_path('resources/views/app.blade.php'),
            dirname(__FILE__) . '/resources/views/home.blade.php' => base_path('resources/views/home.blade.php'),
            dirname(__FILE__) . '/resources/views/welcome.blade.php' => base_path('resources/views/welcome.blade.php'),
        ]);
    }

    /**
     * Publish package resource assets to Laravel project
     *
     * @return void
     */
    private function publishResourceAssets()
    {
        $this->publishes([
            dirname(__FILE__) . '/resources/assets/less' => base_path('resources/assets/less'),
            dirname(__FILE__) . '/resources/assets/js' => base_path('resources/assets/js'),
            dirname(__FILE__) . '/package.json' => base_path('package.json'),
            dirname(__FILE__) . '/gulpfile.js' => base_path('gulpfile.js'),
        ]);
    }

    /**
     * Publish public resource assets to Laravel project
     *
     * @return void
     */
    private function publishPublicAssets()
    {
        $this->publishes([
            dirname(__FILE__) . '/public/img' => public_path('img'),
            dirname(__FILE__) . '/public/plugins'  => public_path('plugins'),
        ], 'assets');
    }

}
