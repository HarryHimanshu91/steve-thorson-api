<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMapDataRequest extends FormRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'center_id' => 'required',
            'category' => 'required',
            'name' => 'required|unique:map_data,name|max:160',
            'eng_description' => 'required',
            'eng_directions' => 'required',
            'swa_description' => 'required',
            'swa_directions' => 'required',
            'phone_number' => 'required',
            'url' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
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
            'center_id.required' => 'Oops! Please select center.',
            'category.required' => 'Oops! Please select category.',
            'name.required' => 'Oops! Please enter title.',
            'name.unique' => 'Oops! The enter title is already exists.',
            'name.max' => 'Oops! The title may not be greater than 160 characters',
            'eng_description.required' => 'Oops! Please enter english description.',
            'eng_directions.required' => 'Oops! Please enter english direction.',
            'swa_description.required' => 'Oops! Please enter swahili description.',
            'swa_directions.required' => 'Oops! Please enter swahili direction.',
            'phone_number.required' => 'Oops! Please enter phone number.',
            'url.required' => 'Oops! Please enter URL.',
            'latitude.required' => 'Oops! Please enter latitude.',
            'longitude.required' => 'Oops! Please enter longitude.'
        ];
    }

    /**
     * Data get from request and assign it on array
     * 
     * @return array
     */

    public function requestData(): array 
    {
        return [
            'center_id' => $this->get('center_id'),
            'category' => $this->get('category'),
            'name' => $this->get('name'),
            'eng_description' => $this->get('eng_description'),
            'eng_directions' => $this->get('eng_directions'),
            'swa_description' => $this->get('swa_description'),
            'swa_directions' => $this->get('swa_directions'),
            'phone_number' => $this->get('phone_number'),
            'url' => $this->get('url'),
            'latitude' => $this->get('latitude'),
            'longitude' => $this->get('longitude')
        ];
    }
}
