<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PreventCommonPassword implements Rule
{

    public function passes($attribute, $value)
    {
        $commonPasswords = [
            '123456', 'password', '123456789', '12345678', '12345',
            '1234567', '1234567890', 'qwerty', 'abc123', 'password1',
        ];

        return !in_array($value, $commonPasswords);
    }

    public function message()
    {
        return 'The chosen password is too common. Please choose a more secure password.';
    }
}
