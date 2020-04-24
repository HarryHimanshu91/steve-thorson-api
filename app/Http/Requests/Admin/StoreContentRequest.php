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
    protected $errorBag = 'language1';

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
            'title' => 'required|max:160',
            'description' => 'required',
            'cat_name' => 'required',
            'status' => 'required',           
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Oops! Please enter content title.',
            'title.max' => 'Oops! The title may not be greater than 160 characters',
            'description.required' => "Oops! Please enter content description.",
            'cat_name.required' => 'Oops! Please select category.',
            'status.required' => 'Oops! Please select content status.'
        ];
    }

    public function contentData(): array 
    {
        return [
            'title' => $this->get('title'),
            'description' => $this->get('description'),
            'cat_name' => $this->get('cat_name'),
            'status' => $this->get('status'),
            'language_id' => $this->get('language_id')
        ];
    }


}
 