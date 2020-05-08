<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
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
        return view('community.mapdata.create')->with(['id'=>Auth::user()->center_id,'mapData'=>$mapData]);
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
