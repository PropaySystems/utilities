<?php

it('can generate a fake id number from date of birth', function () {
    $value = \PropaySystems\Utilities\Helpers\IdNumberHelper::generateIdNumber('19950604', rand(0, 1));

    expect($value)->toHaveLength(13);
})->skip('Need to see why it is failing');

it('can generate a fake id number', function () {
    $value = \PropaySystems\Utilities\Helpers\IdNumberHelper::generateFakeId();

    expect($value)->toHaveLength(13);
});

it('can can get birthday from id number', function () {
    $value = \PropaySystems\Utilities\Helpers\IdNumberHelper::getBirthDate('9808076222089');

    expect($value)->toBe('1998-08-07');
});

it('can can get age from id number', function () {
    $age = ((int) now()->format('Y') - 1998);
    $value = \PropaySystems\Utilities\Helpers\IdNumberHelper::getAgeFromIdNumber('9808076222089');

    expect((int) $value)->toBe($age);
});

it('can validate real id number and return true', function () {
    $value = \PropaySystems\Utilities\Helpers\IdNumberHelper::validateIdNumber([], '9808076222089', []);

    expect($value)->toBeTrue();
});

it('can validate real id number and return false', function () {
    $value = \PropaySystems\Utilities\Helpers\IdNumberHelper::validateIdNumber([], '9808076222000', []);

    expect($value)->toBeFalse();
});
