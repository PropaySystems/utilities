<?php

use PropaySystems\Utilities\Helpers\FileHelper;

dataset('file_sizes', [

    'KB' => [
        'input' => '50000',
        'expected' => '48.83 KB',
    ],

    'MB' => [
        'input' => '5000000',
        'expected' => '4.77 MB',
    ],

    'GB' => [
        'input' => '5000000000',
        'expected' => '4.66 GB',
    ],

    'TB' => [
        'input' => '10000000000000',
        'expected' => '9.09 TB',
    ],

]);

it('can format human-readable file sizes', function (string $input, string $expected) {

    expect(
        FileHelper::formatBytes($input)
    )->toBe(
        $expected
    );

})->with('file_sizes');
