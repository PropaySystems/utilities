<?php

namespace PropaySystems\Utilities\Helpers;

use LivewireUI\Modal\ModalComponent;

class BaseModalComponent extends ModalComponent
{
    public $authenticated = false;

    public $passwordConfirmed = false;

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
