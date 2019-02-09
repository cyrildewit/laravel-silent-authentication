# Laravel Silent Authentication

This Laravel >= 5.5 package allows you to silently authenticate users.

## Overview

I created this package for personal usage. It's based on insights from other open source packages and online blog posts.

## Documentation

In this documentation, you will find some helpful information about the use of this Laravel package.

### Table of contents

1. [Getting Started](#getting-started)
    * [Requirements](#requirements)
    * [Installation](#installation)
2. [Usage](#usage)
    * [Default setup](#default-setup)
    * [SilentAuthentication trait](#preparing-your-model)

## Getting Started

### Requirements

This package requires **PHP 7.1+** and **Laravel 5.5+**.

Lumen is not supported!

#### Version information

| Version | Illuminate | Status         | PHP Version |
|---------|------------|----------------|-------------|
| 1.0     | 5.5 - 5.7  | Active support | >= 7.1.0    |

### Installation

First, you need to install the package via Composer:

```winbatch
composer require cyrildewit/laravel-silent-authentication
```

You can optionally publish the config file with:

```winbatch
php artisan vendor:publish --provider="CyrildeWit\LaravelSilentAuthentication\SilentAuthenticationServiceProvider" --tag="config"
```

#### Register service provider manually

If you prefer to register packages manually, you can add the following provider to your application's providers list.

```php
// config/app.php

'providers' => [
    // ...
    CyrildeWit\LaravelSilentAuthentication\SilentAuthenticationServiceProvider::class,
];
```

## Usage

### Default setup

This package will overwrite the default `SessionGuard` by default. The customized session guard uses the `SilentAuthentication` trait which will allow you silently authenticate users.

If you're not interesting in this default or if it's breaking your application, you can disable it in the config file.

### SilentAuthentication trait

If you're already overwriting the default `SessionGuard` in your application, you can simply implement the `SilentAuthentication` trait.

```php
use Illuminate\Auth\SessionGuard as BaseSessionGuard;
use CyrildeWit\LaravelSilentAuthentication\Guards\Traits\SilentAuthentication;

class SessionGuard extends BaseSessionGuard
{
    use SilentAuthentication;
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG-2.0.md) for more information on what has changed recently.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
