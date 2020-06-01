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
            'title_one' => 'required|max:160|unique:events,title_one',
            'title_second' => 'required|max:160|unique:events,title_second',
            'date' => 'required',
            'time' => 'required',
            'description_one' => 'required',
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
            'title_one.unqiue' => 'Oops! The given title for english is already exists',
            'title_second.unqiue' => 'Oops! The given title for swahili is already exists',
            'title_second.required' => 'Oops! Please enter title of Swahili',
            'title_second.max' => 'Oops! The title may not be greater than 160 characters',
            'date.required' => 'Oops! Please enter date of English',
            'time.required' => 'Oops! Please enter time of English',
            'description_one.required' => 'Oops! Please enter description of English',
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
        $dateTime = strtotime($this->get('date')." ".$this->get('time'));
        $dateTime = date('Y-m-d H:i:s',$dateTime);
        return [
            'center_id' => $this->get('center_id'),
            'content_id' => $this->get('content_id'),
            'title_one' => $this->get('title_one'),
            'title_second' => $this->get('title_second'),
            'datetime' => $dateTime,
            'description_one' => $this->get('description_one'),
            'description_second' => $this->get('description_second'),           
            'tracking_code' => $this->get('tracking_code'),
            'unlock_content' => $this->get('unlock_content'),
        ];
    }


}
