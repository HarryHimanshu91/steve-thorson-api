<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:160|string',
            'email' => 'required|unique:admins,email|email',
            'role' => 'required',
            'status' => 'required'
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
            'name.required' => 'Oops! Please enter name.',
            'name.max' => 'Oops! The name may not be greater than 160 characters',
            'email.required' => "Oops! Please enter email address.",
            'email.email' => "Oops! Please enter valid email address.",
            'email.unique' => "Oops! The enter email address is already exists.",
            'role.required' => 'Oops! Please assign role to the user.',
            'status.required' => 'Oops! Please select status.'
        ];
    }

    /**
     * Data get from request and assign it on array
     * 
     * @return array
     */

    public function userData(): array 
    {
        return [
            'name' => $this->get('name'),
            'email' => $this->get('email'),
            'role_id' => $this->get('role'),
            'password' => \Hash::make(env('NEW_USER_DEFAULT_PASSWORD')),
            'status' => $this->get('status')
        ];
    }
}
