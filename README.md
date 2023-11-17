# Propay Utilities

[![Latest Version on Packagist](https://img.shields.io/packagist/v/propaysystems/utilities.svg?style=flat-square)](https://packagist.org/packages/propaysystems/utilities)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/propaysystems/utilities/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/propaysystems/utilities/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/propaysystems/utilities/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/propaysystems/utilities/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/propaysystems/utilities.svg?style=flat-square)](https://packagist.org/packages/propaysystems/utilities)

A set of helper utilities and traits to commuan functions we use everyday and across all our systems.

## Requirements

PHP 8.1+  
Laravel 9+  

## Installation

You can install the package via composer:

```bash
composer require propaysystems/utilities
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="utilities-config"
```

## Usage

```php
$utilities = new PropaySystems\Utilities();
echo $utilities->echoPhrase('Hello, PropaySystems!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ettienne Louw](https://github.com/PropaySystems)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
