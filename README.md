# Debug and Monitor queues locally in Laravel.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/franktheprogrammer/laravel-queuedup.svg?style=flat-square)](https://packagist.org/packages/franktheprogrammer/laravel-queuedup)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/franktheprogrammer/laravel-queuedup/run-tests?label=tests)](https://github.com/franktheprogrammer/laravel-queuedup/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/franktheprogrammer/laravel-queuedup/Check%20&%20fix%20styling?label=code%20style)](https://github.com/franktheprogrammer/laravel-queuedup/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/franktheprogrammer/laravel-queuedup.svg?style=flat-square)](https://packagist.org/packages/franktheprogrammer/laravel-queuedup)

Debug and Monitor queues locally in Laravel.

## Installation

You can install the package via composer:

```bash
composer require franktheprogrammer/laravel-queuedup
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-queuedup-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$laravelQueuedUp = new FrankTheProgrammer\LaravelQueuedUp();
echo $laravelQueuedUp->echoPhrase('Hello, FrankTheProgrammer!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Frank Perez](https://github.com/franktheprogrammer)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
