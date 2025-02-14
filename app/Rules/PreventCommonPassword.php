<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PreventCommonPassword implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $commonPasswords = [
            '123456', 'password', '123456789', '12345678', '12345',
            '1234567', '1234567890', 'qwerty', 'abc123', 'password1',
        ];

        return !in_array($value, $commonPasswords);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The chosen password is too common. Please choose a more secure password.';
    }
}
