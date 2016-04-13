# Laravel Admin Theme

[![Latest Stable Version](https://poser.pugx.org/syahzul/admin-theme/v/stable?format=flat)](https://packagist.org/packages/syahzul/admin-theme)
[![Total Downloads](https://poser.pugx.org/syahzul/admin-theme/downloads?format=flat)](https://packagist.org/packages/syahzul/admin-theme)
[![Latest Stable Version](https://poser.pugx.org/syahzul/admin-theme/v/stable?format=flat)](https://packagist.org/packages/syahzul/admin-theme)
[![License](https://poser.pugx.org/syahzul/admin-theme/license?format=flat)](https://packagist.org/packages/syahzul/admin-theme)

Admin theme for your Laravel 5.2 application. Inspired by [AdminLTE template Laravel 5 package](https://github.com/acacha/adminlte-laravel) and relies
on [Twitter Bootstrap 3.3.*](https://github.com/twbs/bootstrap) and [AdminLTE](https://github.com/almasaeed2010/AdminLTE).

## Requirement

Run these commands to generate basic authentication views and routes.

```
php artisan make:auth
php artisan migrate
```

This package relies on Bootstrap and AdminLTE package. To install the packages, simply execute:

```
composer require twbs/bootstrap
composer require almasaeed2010/adminlte
```

## Installation

Please take note that this package will replace some default view files generate by Laravel. Use fresh
copy of Laravel installation only.

First, pull in the package through Composer.

```
composer require syahzul/admin-theme
```

Now include the service provider within `config/app.php`.

```
'providers' => [
    Syahzul\AdminTheme\ServiceProvider::class,
];
```

Next, run the command to begin.

```
php artisan make:admintheme
```

## Compiling asset files

Run these commands to download all additional package and compiling assets for your app.

```
npm install
gulp
```

## License

Laravel Admin Theme is open-sourced software licensed under the MIT license.

## Warning

Not ready for production! Use at your own risk!
