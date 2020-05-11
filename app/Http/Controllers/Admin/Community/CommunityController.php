<?php

namespace App\Http\Controllers\Admin\Community;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Community;
use App\User;
use App\Models\MapData;
use App\Models\Event;
use App\Models\Notification;
use App\Models\Content;
use Illuminate\Support\Facades\DB;
use App\Imports\MapDataImport;
use Maatwebsite\Excel\Facades\Excel;

class CommunityController extends Controller
{
    /**
     *  Method to list all Communities with Region
     */
    public function index()
    {
        $communities = Community::with('region')->get();
        return view('community.view',compact('communities'));
    }    

    /**
     * Method to get unique Community with Dashboard
     * @param $id
     */
    

   public function dashboard($id)
   {
       $name = Community::whereId($id)->pluck('title')->first();
       return view('community.dashboard.view',compact('id','name'));
   }

    /**
     * Method to get unique Community with Members
     * @param $id
     */

   public function members($id)
   {
       $users = User::whereCenterId($id)->get();
       return view('community.members.view',compact('id','users'));
   }

    /**
     * method for fetch map data 
     * @param $id
     */
   
    public function mapdata($id)
    {
        $mapData = MapData::whereCenterId($id)->get();
        return view('community.mapdata.create',compact('id','mapData'));
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

    /**
     * Method to get unique Community with Events
     * @param $id
     */

   public function createevent($id)
   { 
       $englishContents = Content::select('id','title')->whereLanguageId('1')->get();
       $swahiliContents = Content::select('id','title')->whereLanguageId('2')->get();
       $events = Event::whereCenterId($id)->get();
       return view('community.events.create',compact('id','englishContents','swahiliContents','events'));
   }
   
    /**
     * Method to get unique Community with Notification
     * @param $id
     */
   
   public function createnotification($id)
   {
      $notifications = Notification::whereCenterId($id)->get();
      return view('community.notifications.create',compact('id','notifications'));
   }



}
