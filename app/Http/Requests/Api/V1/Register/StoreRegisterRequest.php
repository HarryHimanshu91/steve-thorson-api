<?php

namespace App\Http\Requests\Api\V1\Register;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'region' => 'required',
            'center' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
            'uid' => 'required|unique:users,uid'
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
            'firstname.required' => 'Oops! Please enter email address.',
            'lastname.required' => 'Oops! Please enter email address.',
            'phone.required' => 'Oops! Please enter phone number.',
            'phone.unique' => "Oops! The phone number you entered is already registered with us.",
            'password.required' => "Oops! Please enter password.",
            'region.required' => 'Oops! Please select the region.',
            'center.required' => 'Oops! Please select the center.',
            'image.mimes' => 'Oops! please select only jpeg, png & jpg image.',
            'uid.required' => 'Oops! UID is not verified, please try again.',
            'uid.unique' => 'Oops! The given UID is already exist.'
        ];
    }

    /**
     * Data required to login from request
     *
     * @return array
     */
    public function registerData(): array
    {
        return [
            'firstname' => $this->get('firstname'),
            'lastname' => $this->get('lastname'),
            'phone' => $this->get('phone'),
            'password' => \Hash::make($this->get('password')),
            'region_id' => $this->get('region'),
            'center_id' => $this->get('center'),
            'uid' => $this->get('uid')
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
