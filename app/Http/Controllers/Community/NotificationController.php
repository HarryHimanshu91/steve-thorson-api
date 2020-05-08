<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\Community\NotificationStoreRequest;
use App\Models\Notification;
use Auth;

class NotificationController extends Controller
{
    /**
     * Method to get unique Community with Notification
     * @param $id
     */
   
    public function index()
    {
        $notifications = Notification::whereCenterId(Auth::user()->center_id)->get();
        return view('community.notifications.create')->with(['id'=>Auth::user()->center_id, 'notifications' => $notifications]);
    }

    /**
     * Store Notification into the Database.
     */

    public function store(NotificationStoreRequest $request)
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
     * Display specific Events with Unique Id.
     */

    public function show($id, $cId)
    {
        $communityId = $cId;
        $notifications = Notification::with('community')->whereId($id)->first();
        return view('community.notifications.show',compact('notifications','communityId'));
    }
}
