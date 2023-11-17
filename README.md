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

## Features

## Helpers

### <u>-- Database Helper --</u>
Clears all data and reset auto increment on given table. 
```php
DatabaseHelper::resetTable($table)
```

### <u>-- Date Helper --</u>
This will get the month name of the month number you pass in. Abbreviation will return the short name of the month.
```php
DateHelper::getMonthName($number, $abbreviation = false)
```
Get current financial year of South Africa 
```php
DateHelper::getFiscalYear()
```
Get time 
```php
DateHelper::getTime($string)
```

### <u>-- File Helper --</u>
This will get the human-readable format of the bytes you pass in
```php
FileHelper::formatBytes($bytes, $precision = 2)
```

### <u>-- Http Helper --</u>
Get the currently assigned public ip address of the request
```php
HttpHelper::getIp()
```
Get the currently useragent of the request
```php
HttpHelper::getUserAgent()
```
Get the hostname/domain name of the system. You can specify full to return http::// parts aswell  
```php
HttpHelper::hostname($full = false)
```
Get the subdomain of the current system
```php
HttpHelper::subdomain()
```

### <u>-- Id Number Helper --</u>
Generate a fake id number for testing from the date of birth
```php
IdNumberHelper::generateIdNumber($dateOfBirt, int $male = 1)
```
Generate a complete fake id number for testing
```php
IdNumberHelper::generateFakeNumber($dateOfBirt, int $male = 1)
```
Get gender from the id number
```php
IdNumberHelper::getGenderCode($idNumber)
```
Get the date of birth from the id number
```php
IdNumberHelper::getBirthDate($idNumber)
```
Get age from the id number
```php
IdNumberHelper::getAgeFromIdNumber($idNumber)
```
Validate the id number
```php
IdNumberHelper::getAgeFromIdNumber($attribute, $value, $parameters)
```

### <u>-- Number Helper --</u>
Will generate a random integer between 1 and 100 000
```php
NumberHelper::randomInt()
```
Will get the % difference between 2 number
```php
NumberHelper::getPercentageDifference(int $last, int $current)
```
This will format the number accordingly 100000 will become 100.00k
```php
NumberHelper::numberFormat(int $number)
```

### <u>-- Route Helper --</u>
Check of the string is in the current route name
```php
RouteHelper::currentRouteContains($string)
```

### <u>-- SMS Helper --</u>
Get the number of sms messages from the string
```php
SmsHelper::multipart_count($str)
```

### <u>-- Spatie Media Helper --</u>
Functions related to the spatie media package for managing files  
https://spatie.be/docs/laravel-medialibrary/v10/introduction

### <u>-- String Helper --</u>
This will get the first character of each word and capitalise them and only return first letter/s
```php
StringHelper::initials($string)
```
This will capitalise first character of each word and return the string
```php
StringHelper::capitaliseFirstChar($string)
```
Removed all white spaces and special characters
```php
StringHelper::clean($string)
```
This will generate a random password
```php
StringHelper::generatePassword($string)
```
This will mask a string with relevant characters
```php
StringHelper::mask($string)
```
Transform db column name to human-readable
```php
StringHelper::dbColumnHumanReadable()
```
Transform db column name to human-readable relation
```php
StringHelper::dbColumnRelation()
```
Return a list of all special characters
```php
StringHelper::specialCharacters()
```

## Traits



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
