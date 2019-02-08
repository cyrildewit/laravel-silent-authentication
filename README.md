# Laravel Silent Authentication

This Laravel >= 5.5 package allows you to silently authenticate users.

## Documentation

In this documentation, you will find some helpful information about the use of this Laravel package.

### Table of contents

1. [Getting Started](#getting-started)
    * [Requirements](#requirements)
    * [Installation](#installation)
2. [Usage](#usage)
    * [](#preparing-your-model)

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
