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
            'community' => 'required_if:role,2',
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
            'community.required_if' => 'Oops! Please select community when role is community.',
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
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
        $str = substr(str_shuffle($str_result),  
                        0, 10); 

        return [
            'name' => $this->get('name'),
            'email' => $this->get('email'),
            'role_id' => $this->get('role'),
            'center_id' => $this->get('community'), 
            'password' => $str,
            'status' => $this->get('status')
        ];
    }
}
