<?php

namespace Syahzul\AdminTheme\Commands;

use ErrorException;
use Illuminate\Console\Command;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\File;

class AdminThemeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admintheme';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold Laravel Admin Theme controllers, views and other required files';

    /**
     * The Laravel version
     * 
     * @var float
     */
    protected $version;

    /**
     * The views that need to be exported.
     *
     * @var array
     */
    protected $views = [
        'auth/login.stub' => 'auth/login.blade.php',
        'auth/register.stub' => 'auth/register.blade.php',
        'auth/passwords/email.stub' => 'auth/passwords/email.blade.php',
        'auth/passwords/reset.stub' => 'auth/passwords/reset.blade.php',

        'emails/password.stub' => 'emails/password.blade.php',

        'errors/404.stub' => 'errors/404.blade.php',
        'errors/500.stub' => 'errors/500.blade.php',
        'errors/503.stub' => 'errors/503.blade.php',

        'layouts/app.stub' => 'layouts/app.blade.php',
        'layouts/basic.stub' => 'layouts/basic.blade.php',
        'layouts/site.stub' => 'layouts/site.blade.php',

        'partials/auth_scripts.stub' => 'partials/auth_scripts.blade.php',
        'partials/control_sidebar.stub' => 'partials/control_sidebar.blade.php',
        'partials/footer.stub' => 'partials/footer.blade.php',
        'partials/header.stub' => 'partials/header.blade.php',
        'partials/login_logo.stub' => 'partials/login_logo.blade.php',
        'partials/main_header.stub' => 'partials/main_header.blade.php',
        'partials/page_heading.stub' => 'partials/page_heading.blade.php',
        'partials/register_logo.stub' => 'partials/register_logo.blade.php',
        'partials/scripts.stub' => 'partials/scripts.blade.php',
        'partials/sidebar.stub' => 'partials/sidebar.blade.php',

        'profile/index.stub' => 'profile/index.blade.php',
        'profile/partials/settings.stub' => 'profile/partials/settings.blade.php',

        'users/index.stub' => 'users/index.blade.php',

        'home.stub' => 'home.blade.php',
        'welcome.stub' => 'welcome.blade.php',
    ];

    /**
     * The controllers that need to be exported.
     *
     * @var array
     */
    protected $controllers = [
        'ProfileController.stub' => 'ProfileController.php',
        'UsersController.stub'   => 'UsersController.php',
    ];

    /**
     * The asset files that need to be exported.
     *
     * @var array
     */
    protected $assets = [
        'resources/assets/less/app.less' => __DIR__.'/../stubs/less/app.stub',
        'resources/assets/less/welcome.less' => __DIR__.'/../stubs/less/welcome.stub',
        'resources/assets/js/app.js' => __DIR__.'/../stubs/js/app.stub',
        'resources/assets/js/dashboard.js' => __DIR__.'/../stubs/js/dashboard.stub',
        'gulpfile.js' => __DIR__.'/../stubs/gulpfile.stub',
    ];

    /**
     * The LESS folder that need to be copied.
     *
     * @var array
     */
    protected $lessSources = [
        'vendor/almasaeed2010/adminlte/build/less' => 'resources/assets/less/adminlte',
        'vendor/twbs/bootstrap/less' => 'resources/assets/less/bootstrap-less',
    ];

    public function __construct()
    {
        parent::__construct();

        $this->version = $this->getLaravelVersion();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        if ($this->checkPackages()) {
            $this->createDirectories();
            $this->exportViews();
            $this->exportControllers();
            $this->exportRoutes();
            $this->copyAssetFiles();
            $this->copyPlugins();
            $this->copyLessFolders();
            $this->copySampleImages();

            $this->comment('AdminTheme scaffolding generated successfully!');
        }
    }

    /**
     * Create the directories for the files.
     *
     * @return void
     */
    protected function createDirectories()
    {
        if (! is_dir(base_path('resources/views/layouts'))) {
            mkdir(base_path('resources/views/layouts'), 0755, true);
        }

        if (! is_dir(base_path('resources/views/emails'))) {
            mkdir(base_path('resources/views/emails'), 0755, true);
        }

        if (! is_dir(base_path('resources/views/errors'))) {
            mkdir(base_path('resources/views/errors'), 0755, true);
        }

        if (! is_dir(base_path('resources/views/partials'))) {
            mkdir(base_path('resources/views/partials'), 0755, true);
        }

        if (! is_dir(base_path('resources/views/profile'))) {
            mkdir(base_path('resources/views/profile'), 0755, true);
        }

        if (! is_dir(base_path('resources/views/profile/partials'))) {
            mkdir(base_path('resources/views/profile/partials'), 0755, true);
        }

        if (! is_dir(base_path('resources/views/users'))) {
            mkdir(base_path('resources/views/users'), 0755, true);
        }

        if (! is_dir(base_path('resources/views/auth/passwords'))) {
            mkdir(base_path('resources/views/auth/passwords'), 0755, true);
        }

        if (! is_dir(public_path('plugins'))) {
            mkdir(public_path('plugins'), 0755, true);
        }

        if (! is_dir(base_path('resources/assets/less'))) {
            mkdir(base_path('resources/assets/less'), 0755, true);
        }

        if (! is_dir(base_path('resources/assets/js'))) {
            mkdir(base_path('resources/assets/js'), 0755, true);
        }
    }

    /**
     * Export the views.
     *
     * @return void
     */
    protected function exportViews()
    {
        foreach ($this->views as $key => $value) {
            $path = base_path('resources/views/'.$value);

            $this->line('<info>View:</info> '.$path);

            try {
                copy(__DIR__ . '/../stubs/views/' . $key, $path);
            } catch (ErrorException $e) {
                $this->error(__DIR__ . '/../stubs/views/' . $key);
                $this->error($path);
            }
        }
    }

    /**
     * Export the controllers.
     *
     * @return void
     */
    protected function exportControllers()
    {
        foreach ($this->controllers as $key => $value) {

            $path = app_path('Http/Controllers/'.$value);

            $this->line('<info>Controller:</info> '.$path);

            file_put_contents(
                app_path('Http/Controllers/'.$value),
                $this->compileControllerStub($key)
            );
        }
    }

    /**
     * Export the routes.
     *
     * @return void
     */
    protected function exportRoutes()
    {
        if ($this->version < 5.3) {
            $routeFile = app_path('Http/routes.php');
            $stubFile = __DIR__.'/../stubs/routes.stub';
        }
        else {
            $routeFile = base_path('routes/web.php');
            $stubFile = __DIR__.'/../stubs/routes/web.stub';
        }

        $routeContent = file_get_contents($routeFile);
        
        preg_match('/ProfileController@view/', $routeContent, $matches);

        if (! count($matches)) {
            $this->info('Updated Routes File.');

            file_put_contents(
                $routeFile,
                file_get_contents($stubFile),
                FILE_APPEND
            );
        }
    }

    /**
     * Compiles the controller stub.
     *
     * @param $name
     * @return string
     */
    protected function compileControllerStub($name)
    {
        return str_replace(
            '{{namespace}}',
            $this->getAppNamespace(),
            file_get_contents(__DIR__.'/../stubs/controllers/'.$name)
        );
    }

    /**
     * Check all required packages
     *
     * @return bool
     */
    protected function checkPackages()
    {
        if (! is_dir(base_path('vendor/twbs'))) {
            $this->line('');
            $this->line('<error> Error </error> Missing <comment>Bootstrap</comment> package!');
            $this->line('Run: <comment>composer require twbs/bootstrap</comment>'."\n");
            return false;
        }

        if (! is_dir(base_path('vendor/almasaeed2010'))) {
            $this->line('');
            $this->line('<error> Error </error> Missing <comment>AdminLTE</comment> package!');
            $this->line('Run: <comment>composer require almasaeed2010/adminlte</comment>'."\n");
            return false;
        }

        if (! is_dir(base_path('node_modules/jquery'))) {
            $this->line('');
            $this->line('<error> Error </error> Missing <comment>jQuery</comment> package!');
            $this->line('Run: <comment>npm install</comment> or <comment>npm install jquery</comment>'."\n");
            return false;
        }

        if (! is_dir(base_path('node_modules/font-awesome'))) {
            $this->line('');
            $this->line('<error> Error </error> Missing <comment>Font Awesome</comment> package!');
            $this->line('Run: <comment>npm install</comment> or <comment>npm install font-awesome</comment>'."\n");
            return false;
        }

        if (! is_dir(base_path('node_modules/ionicons'))) {
            $this->line('');
            $this->line('<error> Error </error> Missing <comment>IonIcons</comment> package!');
            $this->line('Run: <comment>npm install</comment> or <comment>npm install ionicons</comment>'."\n");
            return false;
        }

        return true;
    }

    /**
     * Copy jQuery plugins folder from AdminLTE package
     */
    protected function copyPlugins()
    {
        $destination = public_path('plugins');

        $this->line('<info>Plugin:</info> ' . $destination);
        File::copyDirectory(base_path('vendor/almasaeed2010/adminlte/plugins'), $destination);
    }

    /**
     * Copy Less and Js files
     */
    protected function copyAssetFiles()
    {
        foreach ($this->assets as $destination => $source) {

            $this->line('<info>Asset:</info> ' . base_path($destination));

            file_put_contents(
                base_path($destination),
                file_get_contents($source)
            );
        }
    }

    /**
     * Copy sample images
     */
    protected function copySampleImages()
    {
        $this->line('<info>Images:</info> ' . public_path('samples'));

        File::copyDirectory(
            base_path('vendor/almasaeed2010/adminlte/dist/img'),
            public_path('img/samples')
        );
    }

    /**
     * Copy Less folders
     */
    protected function copyLessFolders()
    {
        foreach ($this->lessSources as $source => $destination) {

            $this->line('<info>LESS:</info> ' . base_path($destination));

            File::copyDirectory(
                base_path($source),
                base_path($destination)
            );
        }
    }

    /**
     * Get Laravel version based on route file.
     * Not a very good solution to check the version number.
     *
     * @return float
     */
    protected function getLaravelVersion()
    {
        $laravel = app();

        return (float) $laravel::VERSION;
    }
    
    protected function getAppNamespace()
    {
        return Container::getInstance()->getNamespace();
    }
}
