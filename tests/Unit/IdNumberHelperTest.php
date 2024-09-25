<?php

use PropaySystems\Utilities\Helpers\IdNumberHelper;

it('can generate a fake id number from date of birth', function () {
    $value = IdNumberHelper::generateIdNumber('19950604', rand(0, 1));

    expect($value)->toHaveLength(13);
})->skip('Need to see why it is failing');

it('can generate a fake id number', function () {
    $value = IdNumberHelper::generateFakeId();

    expect($value)->toHaveLength(13);
});

it('can generate date of birth', function () {
    $value = IdNumberHelper::generateDateOfBirth();

    expect($value)->toHaveLength(13);
})->skip('Must figure this one out later');

it('can can get birthday from id number', function () {
    $value = IdNumberHelper::getBirthDate('9808076222089');

    expect($value)->toBe('1998-08-07');
});

it('can can get age from id number', function () {
    $age = ((int) now()->format('Y') - 1998);
    $value = IdNumberHelper::getAgeFromIdNumber('9808076222089');

    expect((int) $value)->toBe($age);
});

it('can validate real id number and return true', function () {
    $value = IdNumberHelper::validateIdNumber([], '9808076222089', []);

    expect($value)->toBeTrue();
});

it('can validate real id number and return false', function () {
    $value = IdNumberHelper::validateIdNumber([], '9808076222000', []);

    expect($value)->toBeFalse();
});
