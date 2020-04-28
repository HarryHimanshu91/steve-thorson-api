<?php

namespace App\Http\Controllers\Admin\Community;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\Community\NotificationStoreRequest;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
  
    /**
     * Store Notification into the Database.
     */

    public function storeNotifications(NotificationStoreRequest $request)
    {
        $notifiData = Notification::create($request->NotificationData());

        if($notifiData){
            $notification = array(
                'message' => 'Success ! Notification has been added successfully', 
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
     * Display specific Notification with Unique Id.
     */

    public function showNotification($id,$cId)
    {
        $communityId = $cId;
        $notifications = Notification::with('community')-> where('id',$id)->first();
        return view('community.notifications.show',compact('notifications','communityId'));
    }

}
