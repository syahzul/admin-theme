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
        $this->publishController();
        $this->publishViews();
        $this->publishResourceAssets();
        $this->publishNpm();
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
            dirname(__FILE__) . '/resources/views/layouts' => base_path('resources/views/layouts'),
            dirname(__FILE__) . '/resources/views/profile' => base_path('resources/views/profile'),
            dirname(__FILE__) . '/resources/views/users' => base_path('resources/views/users'),
            dirname(__FILE__) . '/resources/views/home.blade.php' => base_path('resources/views/home.blade.php'),
            dirname(__FILE__) . '/resources/views/welcome.blade.php' => base_path('resources/views/welcome.blade.php'),
        ], 'view');
    }

    /**
     * Publish package resource assets to Laravel project
     *
     * @return void
     */
    private function publishController()
    {
        $this->publishes([
            dirname(__FILE__) . '/app/Http/Controllers/ProfileController.php' => base_path('app/Http/Controllers/ProfileController.php'),
        ], 'controller');
    }

    /**
     * Publish package resource assets to Laravel project
     *
     * @return void
     */
    private function publishResourceAssets()
    {
        $this->publishes([
            dirname(__FILE__) . '/resources/assets/less/app.less' => base_path('resources/assets/less/app.less'),
            dirname(__FILE__) . '/resources/assets/less/welcome.less' => base_path('resources/assets/less/welcome.less'),
            dirname(__FILE__) . '/../../../../vendor/almasaeed2010/adminlte/build/less' => base_path('resources/assets/less/adminlte'),
            dirname(__FILE__) . '/../../../../vendor/twbs/bootstrap/less' => base_path('resources/assets/less/bootstrap-less'),
            dirname(__FILE__) . '/resources/assets/js' => base_path('resources/assets/js'),
        ], 'asset');
    }

    /**
     * Publish package resource assets related to NPM to Laravel project
     *
     * @return void
     */
    private function publishNpm()
    {
        $this->publishes([
            dirname(__FILE__) . '/package.json' => base_path('package.json'),
            dirname(__FILE__) . '/gulpfile.js' => base_path('gulpfile.js'),
        ], 'npm');
    }

    /**
     * Publish public resource assets to Laravel project
     *
     * @return void
     */
    private function publishPublicAssets()
    {
        $this->publishes([
            dirname(__FILE__) . '/../../../../vendor/almasaeed2010/adminlte/'  => public_path('plugins'),
            dirname(__FILE__) . '/public/img'  => public_path('img'),
        ], 'public');
    }

}
