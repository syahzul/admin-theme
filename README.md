# Laravel Admin Theme

[![Laravel 5.2](https://img.shields.io/badge/Laravel-5.2-orange.svg?style=flat-square)](http://laravel.com)
[![Latest Stable Version](https://poser.pugx.org/syahzul/admin-theme/v/stable?format=flat-square)](https://packagist.org/packages/syahzul/admin-theme)
[![Total Downloads](https://poser.pugx.org/syahzul/admin-theme/downloads?format=flat-square)](https://packagist.org/packages/syahzul/admin-theme)
[![Latest Unstable Version](https://poser.pugx.org/syahzul/admin-theme/v/unstable?format=flat-square)](https://packagist.org/packages/syahzul/admin-theme)
[![License](https://poser.pugx.org/syahzul/admin-theme/license?format=flat-square)](https://packagist.org/packages/syahzul/admin-theme)

## Before Installation

Run ```php artisan make:auth``` before proceed. Make sure everything working.

The package will replace some default view files.

## Installation

First, pull in the package through Composer.

Run `composer require syahzul/admin-theme`

Now include the service provider within `config/app.php`.

```php
'providers' => [
    Syahzul\AdminTheme\ServiceProvider::class,
];
```

Then, publish the files with:

```php
php artisan vendor:publish --provider="Syahzul\AdminTheme\ServiceProvider" --force
```

**Note:**

Using ```--force``` will overwrite some of default view files.

Admin theme for your Laravel 5.2 applications. The theme written inspired by
[https://github.com/acacha/adminlte-laravel](AdminLTE template Laravel 5 package), with some
improvements.

**Not ready for production!**

Use at your own risk!
