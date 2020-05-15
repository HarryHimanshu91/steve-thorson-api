<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Kreait\Laravel\Firebase\Facades\FirebaseAuth;

class FirebaseUIDRule implements Rule
{
    /**
    * @var string
    */
    protected $phoneNumber;

    /**
    * Create a new rule instance.
    *
    * @param string $phoneNumber
    */
    public function __construct($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
    * Determine if the validation rule passes.
    *
    * @param string $attribute
    * @param mixed $value
    *
    * @return bool
    * @throws \Throwable
    */
    public function passes($attribute, $value)
    {
        try {
            $firebaseUser = FirebaseAuth::getUser($value);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $exception;
            }
            return false;
        }
        return $this->phoneNumber === $firebaseUser->phoneNumber;
    }

    /**
    * Get the validation error message.
    *
    * @return string
    */
    public function message()
    {
        return 'Could not verify phone number. Try again.';
    }
}
