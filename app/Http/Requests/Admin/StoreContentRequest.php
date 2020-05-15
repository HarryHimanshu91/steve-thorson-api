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
     * Get the validation rules that apply to the request for Content Controller.
     *
     * @return array
     */ 
    public function rules()
    {
        return [
            'cat_name' => 'required',
            'english_title' => 'required|max:160|unique:contents,english_title',
            'swahili_title' => 'required|max:160|unique:contents,swahili_title',
            'english_description' => 'required',
            'swahili_description' => 'required',
            'status' => 'required', 
            'audio_english_file' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',      
            'audio_swahili_file' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',       
        ];
    }

     /**
     * Get the custom messages of that rule which return by the rules method for Content Controller.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'cat_name.required' => 'Oops! Please select category.',
            'english_title.required' => 'Oops! Please enter content title for english.',
            'swahili_title.required' => 'Oops! Please enter content title for swahili.',
            'english_title.unique' => 'Oops! The given title for english is already exists',
            'swahili_title.unique' => 'Oops! The given title for swahili is already exists',
            'english_title.max' => 'Oops! The english title may not be greater than 160 characters',
            'swahili_title.max' => 'Oops! The swahili title may not be greater than 160 characters',
            'english_description.required' => "Oops! Please enter content description for english.",   
            'swahili_description.required' => "Oops! Please enter content description for swahili.",           
            'status.required' => 'Oops! Please select content status.',
            'audio_english_file.required' => 'Oops! Please select audio file in English Language.',
            'audio_english_file.mimes' => 'Oops! Please select valid audio file for english',
            'audio_swahili_file.required' => 'Oops! Please select audio file in Swahili Language.',
            'audio_swahili_file.mimes' => 'Oops! Please select valid audio file for swahili',
        ];
    }


     /**
     * Data get from request and assign it on array for Content Controller.
     * 
     * @return array
     */

    public function contentData(): array 
    {
        return [
            'cat_name' => $this->get('cat_name'),
            'english_title' => $this->get('english_title'),
            'swahili_title' => $this->get('swahili_title'),
            'english_description' => $this->get('english_description'),
            'swahili_description' => $this->get('swahili_description'),            
            'status' => $this->get('status')
        ];
    }
   

}
 