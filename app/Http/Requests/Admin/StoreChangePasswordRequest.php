<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidatePassword;

class StoreChangePasswordRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'opass' => ['required', new ValidatePassword ],
            'npass' => 'required',
            'cpass' => 'required|same:npass'
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
            'opass.required' => 'Oops! Please enter old password.',
            'npass.required' => "Oops! Please enter new password.",
            'cpass.required' => 'Oops! Please enter confirm password.',
            'cpass.same' => 'Oops! The confirm password is not matched with new password.'
        ];
    }
}
