<?php

namespace App\Http\Requests\Admin\Community;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
     * Get the validation rules that apply to the request for Event Controller.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content_id' => 'required',
            'title_one' => 'required|max:160',
            'date_one' => 'required',
            'time_one' => 'required',
            'description_one' => 'required',
            'title_second' => 'required|max:160',
            'date_second' => 'required',
            'time_second' => 'required',
            'description_second' => 'required',
            'tracking_code' => 'required|max:100|unique:events',
            'unlock_content' => 'required',
           
        ];
    }

    /**
     * Get the custom messages of that rule which return by the rules method for Event Controller
     * 
     * @return array
     */



    public function messages()
    {
        return [
            'content_id.required' => 'Oops! Please select content title',
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
            'tracking_code.required' => 'Oops! Please enter Tracking Code',
            'unlock_content.required' => 'Oops! Please select to unlock content',
        ];
    }


    /**
     * Data get from request and assign it on array for Event Controller.
     * 
     * @return array
     */


    public function eventData(): array 
    {
        return [
            'center_id' => $this->get('center_id'),
            'content_id' => $this->get('content_id'),
            'title_one' => $this->get('title_one'),
            'date_one' => $this->get('date_one'),
            'time_one' => $this->get('time_one'),
            'description_one' => $this->get('description_one'),
            'title_second' => $this->get('title_second'),
            'date_second' => $this->get('date_second'),
            'time_second' => $this->get('time_second'),
            'description_second' => $this->get('description_second'),
            'tracking_code' => $this->get('tracking_code'),
            'unlock_content' => $this->get('unlock_content'),
        ];
    }


}
