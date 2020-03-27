<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role' => 'required|unique:roles,name',
            'status' => 'required',
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
            'role.required' => 'Oops! Please enter role.',
            'role.unique' => "Oops! The enter role is already exists.",
            'status.required' => 'Oops! Please select status.'
        ];
    }

    /**
     * Data get from request and assign it on array
     * 
     * @return array
     */

    public function roleData(): array 
    {
        return [
            'name' => $this->get('role'),
            'status' => $this->get('status')
        ];
    }
}
