<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;

class EmailExists implements Rule
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
        return User::whereEmail($value)->count();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Oops! The enter email address is not exists on our system.';
    }
}
