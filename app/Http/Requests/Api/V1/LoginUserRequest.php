<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class LoginUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ];
    }

    /**
     * Get the custom messages of that rule which return by the rules method
     *
     * @return array
     */

    public function messages()
    {
        return [
            'email.required' => 'Oops! Please enter email address.',
            'email.exists' => "Oops! The email address you entered is not in our system. Please go back and select the green 'Sign Up with Email' button.",
            'email.email' => 'Oops! The email address you entered is not valid.'
        ];
    }

    /**
     * Data required to login from request
     *
     * @return array
     */
    public function loginData(): array
    {
        return [
            'email' => $this->get('email'),
            'password' => $this->get('password')
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

}
