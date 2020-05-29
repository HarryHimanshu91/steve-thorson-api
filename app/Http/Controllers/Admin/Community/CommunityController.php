<?php

namespace App\Http\Controllers\Admin\Community;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMapDataRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Community;
use App\User;
use App\Models\Event;
use App\Models\Notification;
use App\Models\Content;
use Illuminate\Support\Facades\DB;

class CommunityController extends Controller
{
    /**
     *  Method to list all Communities with Region
     */
    public function index()
    {
        $communities = Community::with('region')->orderBy('id','desc')->get();
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
     * Method to get unique Community with Events
     * @param $id
     */

   public function createevent($id)
   { 
       $contents = Content::select('id','english_title','swahili_title')->get();
       $events = Event::whereCenterId($id)->get();
       return view('community.events.create',compact('id','contents','events'));
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
