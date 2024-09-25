<img src="https://d324x4ew3y6tnn.cloudfront.net/packages/banners/propaysystems-utilities.png" alt="Propay Systems">

# Propay Utilities

[![Latest Version on Packagist](https://img.shields.io/packagist/v/propaysystems/utilities.svg?style=flat-square)](https://packagist.org/packages/propaysystems/utilities)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/propaysystems/utilities/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/propaysystems/utilities/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/propaysystems/utilities/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/propaysystems/utilities/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/propaysystems/utilities.svg?style=flat-square)](https://packagist.org/packages/propaysystems/utilities)

A set of helper utilities and traits to common functions we use everyday and across all our systems.

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
DatabaseHelper::resetTable($table);
```

### <u>-- Date Helper --</u>
This will get the month name of the month number you pass in. Abbreviation will return the short name of the month.
```php
DateHelper::getMonthName($number, $abbreviation = false);
```
Get current financial year of South Africa 
```php
DateHelper::getFiscalYear();
```
Get time 
```php
DateHelper::getTime($string);
```

### <u>-- File Helper --</u>
This will get the human-readable format of the bytes you pass in
```php
FileHelper::formatBytes($bytes, $precision = 2);
```

### <u>-- Http Helper --</u>
Get the currently assigned public ip address of the request
```php
HttpHelper::getIp();
```
Get the currently useragent of the request
```php
HttpHelper::getUserAgent();
```
Get the hostname/domain name of the system. You can specify full to return http::// parts aswell  
```php
HttpHelper::hostname($full = false);
```
Get the subdomain of the current system
```php
HttpHelper::subdomain();
```

### <u>-- Id Number Helper --</u>
Generate a fake id number for testing from the date of birth
```php
IdNumberHelper::generateIdNumber($dateOfBirt, int $male = 1);
```
Generate a complete fake id number for testing
```php
IdNumberHelper::generateFakeNumber($dateOfBirt, int $male = 1);
```
Get gender from the id number
```php
IdNumberHelper::getGenderCode($idNumber);
```
Get the date of birth from the id number
```php
IdNumberHelper::getBirthDate($idNumber);
```
Get age from the id number
```php
IdNumberHelper::getAgeFromIdNumber($idNumber);
```
Validate the id number
```php
IdNumberHelper::getAgeFromIdNumber($attribute, $value, $parameters);
```

### <u>-- Number Helper --</u>
Will generate a random integer between 1 and 100 000
```php
NumberHelper::randomInt();
```
Will get the % difference between 2 number
```php
NumberHelper::getPercentageDifference(int $last, int $current);
```
This will format the number accordingly 100000 will become 100.00k
```php
NumberHelper::numberFormat(int $number);
```
This will combine a country prefix ex: 27 with the cell number ex: 0821231234 and return 27821231234
```php
NumberHelper::combineCellPrefix($prefix, $number)
```

### <u>-- Route Helper --</u>
Check of the string is in the current route name
```php
RouteHelper::currentRouteContains($string);
```

### <u>-- SMS Helper --</u>
Get the number of sms messages from the string
```php
SmsHelper::multipart_count($str);
```

### <u>-- Spatie Media Helper --</u>
Helper functions related to the spatie media package for managing files  
https://spatie.be/docs/laravel-medialibrary/v10/introduction

### <u>-- String Helper --</u>
This will get the first character of each word and capitalise them and only return first letter/s
```php
StringHelper::initials($str, bool $upperCase = true);
```
This will capitalise first character of each word and return the string
```php
StringHelper::capitaliseFirstChar($string);
```
Removed all white spaces and special characters
```php
StringHelper::clean($string, string $delimiter = '-', bool $toLower = false, bool $removeSpecialChars = true);
```
This will generate a random password
```php
StringHelper::generatePassword($length = 15, $count = 1, $characters = 'lower_case,upper_case,numbers,special_symbols');
```
This will mask a string with relevant characters
```php
StringHelper::mask($string, string $maskingCharacter = '*', int $padLeft = 4, int $padRight = 4));
```
Transform db column name to human-readable
```php
StringHelper::dbColumnHumanReadable($string_array);
```
Transform db column name to human-readable relation
```php
StringHelper::dbColumnRelation($string_array);
```
Return a list of all special characters
```php
StringHelper::specialCharacters();
```

## Traits
Include these traits in any of your classes

### <u>-- Activity Helper Trait --</u>
This is a helper function to the spatie activity log package  
https://spatie.be/docs/laravel-activitylog/v4/introduction
```php
use ActivityHelper;

$thia->log(string $channel, string $description, $preformedOn = null, $causedBy = null, array $properties = []);
```

### <u>-- TableHelper Trait --</u>
This is a helper for the WireUI notifications to easily fire a notification from any livewire class.
https://v1.wireui.dev/
```php
use AlertHelper;

$this->alert($title, $text...);
$this->alertUpdated();
$this->alertCreated();
$this->alertDeleted();
etc
```

### <u>-- Dropdown Schema Trait --</u>
Use the trait in your database models instead of having to write the boilerplate code multiple times
```php
use DropdownSchema;

$this->table('categories');
```

### <u>-- Composite Primary Key Trait --</u>
Use the trait in your database models to allow access to composite primary keys
```php
use HasCompositePrimaryKey;

$this->find($ids, $columns = ['*']);
$this->setKeysForSaveQuery($query);
```

### <u>-- Password Strength Trait --</u>
Us this trait for password strength progress bar.
```php
use PasswordStrength;
```

### <u>-- Password Validation Trait --</u>
Us this trait for standard password validation.
```php
use PasswordValidationRules;
```

### <u>-- Save to uppercase Trait --</u>
This will fave all your model data to uppercase
```php
use SaveToUpper;
```

### <u>-- Set null on empty Trait --</u>
This will force all empty string to be null instead of empty
```php
use SetNullOnEmpty;

$this->setNullOnEmpty($input);
```

### <u>-- Toggle triggers Trait --</u>
This will toggle enable or disable triggers in the relevant database table
```php
use TriggerHelper;

$this->switchDatabaseTrigger($enable = true, $table = null, $trigger = null, string $connection = 'sqlsrv');
```

### <u>-- TableHelper Trait --</u>
This is a helper for the livewire powergrid package on for the pagination. 
https://livewire-powergrid.com/
```php
use TableHelper;
```


## Testing
Run pest testing
```bash
composer test
```
Run phpstan code analysis
```bash
composer analyse
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
