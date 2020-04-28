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
            'description' => $row['description'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude']
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required','unique:map_data,name'],
            'category' => ['required'],
            'description' => ['required'],
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
            'description.required' => 'Oops! the description field is required.',
            'latitude.required' => 'Oops! the latitude field is required.',
            'longitude.required' => 'Oops! the longitude field is required.'
        ];
    }
}
