<?php

namespace App\Imports;

use App\Models\MapData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Validation\Rule;

class MapDataImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable; 

    protected $centerID;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->centerID = $id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MapData([
            'center_id' => $this->centerID,
            'category' => $row['category'],
            'name' => $row['name'],
            'eng_description' => $row['english_description'],
            'eng_directions' => $row['english_directions'],
            'swa_description' => $row['swahili_description'],
            'swa_directions' => $row['swahili_directions'],
            'phone_number' => $row['phone_number'],
            'url' => $row['url'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude']
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required','unique:map_data,name'],
            'category' => ['required'],
            'english_description' => ['required'],
            'english_directions' => ['required'],
            'swahili_description' => ['required'],
            'swahili_directions' => ['required'],
            'phone_number' => ['required'],
            'url' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required']
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'name.required' => 'Oops! the name field is required.',
            'name.unique' => 'Oops! the name field in the file is already exist.',
            'category.required' => 'Oops! the category field is required.',
            'english_description.required' => 'Oops! the english description field is required.',
            'english_directions.required' => 'Oops! the english directions field is required.',
            'swahili_description.required' => 'Oops! the swahili description field is required.',
            'swahili_directions.required' => 'Oops! the swahili directions field is required.',
            'phone_number.required' => 'Oops! the phone number is required.',
            'url.required' => 'Oops! the url is required',
            'latitude.required' => 'Oops! the latitude field is required.',
            'longitude.required' => 'Oops! the longitude field is required.'
        ];
    }
}
