<?php

uses(\PropaySystems\Utilities\Traits\SetNullOnEmpty::class);

it('set the value to null when variable is empty', function () {
    $input = '';
    $value = $this->setNullOnEmpty($input);

    expect($value)->toBeNull();
});
