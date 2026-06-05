<?php

use PropaySystems\Utilities\Helpers\StringHelper;

it('can create initials from a string', function () {
    $string = StringHelper::initials('Ettienne Louw');

    expect($string)->toBe('EL');
});

it('can capitalize first charters of a string', function () {
    $string = StringHelper::capitaliseFirstChar('john');

    expect($string)->toBe('John');
});

it('can clean a string', function () {
    $string = StringHelper::clean('    This (guy) "is"    testing 123');

    expect($string)->toBe('This guy is testing 123');
});

it('can generate a password', function () {
    $password = StringHelper::generatePassword();

    expect($password)
        ->toHaveLength(15);
});

it('can generate a password with all lowercase', function () {
    $password = StringHelper::generatePassword(18, 1, 'lower_case');

    expect($password)
        ->toHaveLength(18)
        ->toBeLowercase();
});

it('can generate a password with all uppercase', function () {
    $password = StringHelper::generatePassword(15, 1, 'upper_case');

    expect($password)
        ->toHaveLength(15)
        ->toBeUppercase();
});

it('can generate a password with only numbers', function () {
    $password = StringHelper::generatePassword(15, 1, 'numbers');

    expect($password)
        ->toHaveLength(15)
        ->toBeNumeric();
});

it('can mask a string', function () {
    $password = StringHelper::mask('123412341234');

    expect($password)->toBe('1234****1234');
});

it('can return array of special characters', function () {
    $password = StringHelper::specialCharacters();

    expect($password)
        ->toBeArray()
        ->toMatchArray(['è' => 'e']);
});
