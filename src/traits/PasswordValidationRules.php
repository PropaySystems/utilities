<?php

namespace App\Traits;

use Illuminate\Validation\Rules\Password as PasswordValidation;

trait PasswordValidationRules
{
    /**
     * @return array
     */
    protected function currentPasswordRule()
    {
        return [
            'current_password' => 'required',
        ];
    }

    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        return [
            'password' => [
                'required',
                'string',
                PasswordValidation::min(config('custom.security.password_length'))
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'password_confirmation' => 'required|same:password',
        ];
    }
}
