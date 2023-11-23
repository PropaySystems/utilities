<?php

use PropaySystems\Utilities\Helpers\NumberHelper;

it('can generate a random number', function () {
    $value = NumberHelper::randomInt();

    expect($value)->toBeInt($value);
});

it('can generate percentage difference', function () {
    $value = NumberHelper::getPercentageDifference(200, 100);

    expect($value['percentage'])->toBe((float) '50.0');
    expect($value['direction'])->toBe('+');
});

it('can generate percentage difference rounded', function () {
    $value = NumberHelper::getPercentageDifference(200, 100);

    expect($value['percentage'])->toBe((float) '50');
});

it('can format a number to more human-readable', function () {
    $value = NumberHelper::numberFormat(100000);

    expect($value)->toBe('100.00K');
});

it('can format a number to more human-readable without precision', function () {
    $value = NumberHelper::numberFormat(100000, 0);

    expect($value)->toBe('100K');
});

it('can add cell number prefix to a number', function () {
    $value = NumberHelper::combineCellPrefix('27', '0821231234');

    expect($value)->toBe('27821231234');
});
