<?php

namespace App\Http\Controllers\Admin\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Community;
use App\User;
use App\Models\Event;
use App\Models\Notification;


class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::with('region')->get();
        return view('community.view',compact('communities'));
    }

    public function showCommunity($id)
    {
         return view('community.show',compact('id'));
    }
    
   public function dashboard($id)
   {
       return view('community.dashboard.view',compact('id'));
   }

   public function members($id)
   {
       $users = User::whereCenterId($id)->get();
       return view('community.members.view',compact('id','users'));
   }
   
   public function mapdata($id)
   {
       return view('community.mapdata.create',compact('id'));
   }
    
   public function createevent($id)
   { 
       $events = Event::whereCenterId($id)->get();
       return view('community.events.create',compact('id','events'));
   }
   
   
   public function createnotification($id)
   {
      $notifications = Notification::whereCenterId($id)->get();
      return view('community.notifications.create',compact('id','notifications'));
   }

   public function prompt($id)
   {
      return view('community.promptSchedule.create',compact('id'));
   }


}
