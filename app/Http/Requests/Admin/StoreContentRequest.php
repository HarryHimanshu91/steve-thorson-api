<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'cat_name' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Oops! Please enter content title.',
            'description.required' => "Oops! Please enter content description.",
            'cat_name.required' => 'Oops! Please select category.'
        ];
    }

    public function contentData(): array 
    {
        return [
            'title' => $this->get('title'),
            'description' => $this->get('description'),
            'cat_name' => $this->get('cat_name')
        ];
    }


}
 