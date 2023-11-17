<?php

it('can generate a random number', function () {
    $value = \PropaySystems\Utilities\Helpers\NumberHelper::randomInt();

    expect($value)->toBeInt($value);
});

it('can generate percentage difference', function () {
    $value = \PropaySystems\Utilities\Helpers\NumberHelper::getPercentageDifference(200, 100);

    expect($value['percentage'])
        ->toBe((float) '50.0')
        ->expect($value['direction'])
        ->toBe('+');
});

it('can generate percentage difference rounded', function () {
    $value = \PropaySystems\Utilities\Helpers\NumberHelper::getPercentageDifference(200, 100);

    expect($value['percentage'])->toBe((float) '50');
});

it('can format a number to more human-readable', function () {
    $value = \PropaySystems\Utilities\Helpers\NumberHelper::numberFormat(100000);

    expect($value)->toBe('100.00K');
});

it('can format a number to more human-readable without precision', function () {
    $value = \PropaySystems\Utilities\Helpers\NumberHelper::numberFormat(100000, 0);

    expect($value)->toBe('100K');
});
