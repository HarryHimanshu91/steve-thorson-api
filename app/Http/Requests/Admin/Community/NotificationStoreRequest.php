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
     * Get the validation rules that apply to the request for Notification Controller
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_one' => 'required|max:160|unique:notifications,title_one',
            'title_second' => 'required|max:160|unique:notifications,title_second',
            'date' => 'required',
            'time' => 'required',
            'description_one' => 'required',
            'description_second' => 'required',           
        ];
    }

    /**
     * Get the custom messages of that rule which return by the rules method for Notification Controller
     * 
     * @return array
     */

    public function messages()
    {
        return [
            'title_one.required' => 'Oops! Please enter title of English',
            'title_one.max' => 'Oops! The title may not be greater than 160 characters',
            'title_one.unique' => 'Oops! The given english title is already exists.',
            'title_second.required' => 'Oops! Please enter title of Swahili',
            'title_second.max' => 'Oops! The title may not be greater than 160 characters',
            'title_second.unique' => 'Oops! The given swahili title is already exists.',
            'date.required' => 'Oops! Please enter date of English',
            'time.required' => 'Oops! Please enter time of English',
            'description_one.required' => 'Oops! Please enter description of English',
            'description_second.required' => 'Oops! Please enter description of Swahili',            
        ];
    }


     /**
     * Data get from request and assign it on array for Notification Controller.
     * 
     * @return array
     */

    public function NotificationData(): array 
    {
        $dateTime = strtotime($this->get('date')." ".$this->get('time'));
        $dateTime = date('Y-m-d H:i:s',$dateTime);
        return [
            'center_id' => $this->get('center_id'),
            'title_one' => $this->get('title_one'),
            'datetime' =>  $dateTime,
            'description_one' => $this->get('description_one'),
            'title_second' => $this->get('title_second'),
            'description_second' => $this->get('description_second'),
        ];
    }
}
