<?php

it('can format bytes to KB human-readable format', function () {
    $value = \PropaySystems\Utilities\Helpers\FileHelper::formatBytes('50000');

    expect($value)->toBe('48.83 KB');
});

it('can format bytes to MB human-readable format', function () {
    $value = \PropaySystems\Utilities\Helpers\FileHelper::formatBytes('5000000');

    expect($value)->toBe('4.77 MB');
});

it('can format bytes to GB human-readable format', function () {
    $value = \PropaySystems\Utilities\Helpers\FileHelper::formatBytes('5000000000');

    expect($value)->toBe('4.66 GB');
});

it('can format bytes to TB human-readable format', function () {
    $value = \PropaySystems\Utilities\Helpers\FileHelper::formatBytes('10000000000000');

    expect($value)->toBe('9.09 TB');
});
