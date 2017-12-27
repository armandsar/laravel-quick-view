# Opinionated quick return for views in Laravel 5

Are you tired of typing out view name for your controllers? Then this package is for you!

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/armandsar/laravel-quick-view/master.svg?style=flat-square)](https://travis-ci.org/armandsar/laravel-quick-view)
[![Total Downloads](https://img.shields.io/packagist/dt/armandsar/laravel-quick-view.svg?style=flat-square)](https://packagist.org/packages/armandsar/laravel-quick-view)

## Install

Via Composer

``` bash
$ composer require armandsar/laravel-quick-view
```


## Usage

Namespace and controller name as folders and method name as file name.

Given that we have a Admin/UsersController@show

``` php
return quick(['user' => User::first()])
```

would assume a view at admin/users/show.blade.php

## Testing

``` bash
$ phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.