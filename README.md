# PHP Bizhosting API Laravel SDK
[![Build Status](https://travis-ci.org/madeITBelgium/Bizhosting-SDK.svg?branch=master)](https://travis-ci.org/madeITBelgium/Bizhosting-SDK)
[![Coverage Status](https://coveralls.io/repos/github/madeITBelgium/Bizhosting-SDK/badge.svg?branch=master)](https://coveralls.io/github/madeITBelgium/Bizhosting-SDK?branch=master)
[![Latest Stable Version](https://poser.pugx.org/madeITBelgium/Bizhosting-SDK/v/stable.svg)](https://packagist.org/packages/madeITBelgium/Bizhosting-SDK)
[![Latest Unstable Version](https://poser.pugx.org/madeITBelgium/Bizhosting-SDK/v/unstable.svg)](https://packagist.org/packages/madeITBelgium/Bizhosting-SDK)
[![Total Downloads](https://poser.pugx.org/madeITBelgium/Bizhosting-SDK/d/total.svg)](https://packagist.org/packages/madeITBelgium/Bizhosting-SDK)
[![License](https://poser.pugx.org/madeITBelgium/Bizhosting-SDK/license.svg)](https://packagist.org/packages/madeITBelgium/Bizhosting-SDK)

With this Laravel package you can create a Bizhosting integration.

# Installation

```
composer require madeitbelgium/bizhosting
```

Or require this package in your `composer.json` and update composer.

```php
"madeitbelgium/bizhosting": "^1.0"
```

## Publish config file
```php
php artisan vendor:publish --provider="MadeITBelgium\Bizhosting\ServiceProvider\Bizhosting"
```

## Laravel <5.5
After updating composer, add the ServiceProvider to the providers array in `config/app.php`

```php
MadeITBelgium\Bizhosting\ServiceProvider\Bizhosting::class,
```

You can use the facade for shorter code. Add this to your aliases:

```php
'Bizhosting' => MadeITBelgium\Bizhosting\Facade\Bizhosting::class,
```

# Documentation
## Usage
```php

use MadeITBelgium\Bizhosting\Facade\Bizhosting;

$listDomainnames = Bizhosting::domainname()->list($page = 1, $search = null);
```

# Support

Support github or mail: info@bizhosting.be

# Contributing

Please try to follow the psr-2 coding style guide. http://www.php-fig.org/psr/psr-2/
# License

This package is licensed under LGPL. You are free to use it in personal and commercial projects. The code can be forked and modified, but the original copyright author should always be included!
