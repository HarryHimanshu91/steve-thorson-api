<?php

namespace App\Http\Requests\Admin\Community;

use Illuminate\Foundation\Http\FormRequest;

class NotificationStoreRequest extends FormRequest
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
            'title_one' => 'required|max:160',
            'date_one' => 'required',
            'time_one' => 'required',
            'description_one' => 'required',
            'title_second' => 'required|max:160',
            'date_second' => 'required',
            'time_second' => 'required',
            'description_second' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'title_one.required' => 'Oops! Please enter title of English',
            'title_one.max' => 'Oops! The title may not be greater than 160 characters',
            'date_one.required' => 'Oops! Please enter date of English',
            'time_one.required' => 'Oops! Please enter time of English',
            'description_one.required' => 'Oops! Please enter description of English',
            'title_second.required' => 'Oops! Please enter title of Swahili',
            'title_second.max' => 'Oops! The title may not be greater than 160 characters',
            'date_second.required' => 'Oops! Please enter date of Swahili',
            'time_second.required' => 'Oops! Please enter time of Swahili',
            'description_second.required' => 'Oops! Please enter description of Swahili',
        ];
    }

    public function NotificationData(): array 
    {
        return [
            'center_id' => $this->get('center_id'),
            'title_one' => $this->get('title_one'),
            'date_one' => $this->get('date_one'),
            'time_one' => $this->get('time_one'),
            'description_one' => $this->get('description_one'),
            'title_second' => $this->get('title_second'),
            'date_second' => $this->get('date_second'),
            'time_second' => $this->get('time_second'),
            'description_second' => $this->get('description_second'),
        ];
    }
}
