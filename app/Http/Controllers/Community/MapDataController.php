<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMapDataRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Imports\MapDataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\MapData;
use Auth;

class MapDataController extends Controller
{
    /**
     * method for fetch map data 
     * @param $id
     */
   
    public function index()
    {
        $mapData = MapData::whereCenterId(Auth::user()->center_id)->get();
        return view('community.mapdata.view')->with(['id'=>Auth::user()->center_id,'mapData'=>$mapData]);
    }

    /**
     * method to show the form
     */

    public function create($id){
        return view('community.mapdata.create')->with('id', $id);
    }

    /**
     * method for store map data
     * 
     *  @param 
     */

    public function store(StoreMapDataRequest $request){
        $mapdata = MapData::create($request->requestData());
        if($mapdata){
            $notification = array(
                'message' => 'Success ! Mapdata has been added successfully', 
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Error ! Something went wrong', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification)->withInput();
        }
    }

    /**
     * method for show edit form 
     * 
     * @param 
     */

    public function edit($id){
        $mapdata = MapData::whereId($id)->first();
        return view('community.mapdata.edit')->with(['mapdata'=>$mapdata,'id'=>$mapdata->center_id]);
    }

    /**
     * method for update data
     * 
     * @param
     */

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required|max:160|unique:map_data,name,'.$id,
            'eng_description' => 'required',
            'eng_directions' => 'required',
            'swa_description' => 'required',
            'swa_directions' => 'required',
            'phone_number' => 'required|numeric|size:11',
            'url' => 'required|max:100',
            'latitude' => 'required|max:50',
            'longitude' => 'required|max:50'
        ],
        [
            'category.required' => 'Oops! Please select category.',
            'name.required' => 'Oops! Please enter title.',
            'name.unique' => 'Oops! The enter title is already exists.',
            'name.max' => 'Oops! The title may not be greater than 160 characters',
            'eng_description.required' => 'Oops! Please enter english description.',
            'eng_directions.required' => 'Oops! Please enter english direction.',
            'swa_description.required' => 'Oops! Please enter swahili description.',
            'swa_directions.required' => 'Oops! Please enter swahili direction.',
            'phone_number.required' => 'Oops! Please enter phone number.',
            'phone_number.size' => 'Oops! The phone number is not the valid size.',
            'phone_number.numeric' => 'Oops! The phone number is not the number',
            'url.required' => 'Oops! Please enter URL.',
            'latitude.required' => 'Oops! Please enter latitude.',
            'latitude.max' => 'Oops! The latitude may not be greater than 50 characters',
            'longitude.required' => 'Oops! Please enter longitude.',
            'longitude.max' => 'Oops! The longitude may not be greater than 50 characters'
        ]);

        if ($validator->fails()) {
            return redirect()->route('community.mapdata.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $mapdata = MapData::whereId($id)->update([
            'category' => $request->get('category'),
            'name' => $request->get('name'),
            'eng_description' => $request->get('eng_description'),
            'eng_directions' => $request->get('eng_directions'),
            'swa_description' => $request->get('swa_description'),
            'swa_directions' => $request->get('swa_directions'),
            'phone_number' => $request->get('phone_number'),
            'url' => $request->get('url'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude')
        ]);

        $notification = array(
            'message' => 'Success ! Mapdata has been updated successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('community.mapdata')->with($notification);
    }

    /**
     * method for import data from csv
     * @param Request $request
     * @param $id
     */

    public function importMapData(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt'
        ],
        [
            'file.required' => 'Oops! Please choose file.',
            'file.mimes' => 'Oops! Please choose only csv file.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $importedData = Excel::import(new MapDataImport($id),$request->file('file'));
            $notification = array(
                'message' => 'Success ! Map Data has been imported successfully.', 
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }catch(\MaatWebsite\Excel\Validators\ValidationException $e){
            $errStr = '';
            foreach($e->failures() as $failure){
                foreach($failure->errors() as $error){
                    $errStr .= $error."<br>";
                }
            }
            $notification = array(
                'message' => $errStr, 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
