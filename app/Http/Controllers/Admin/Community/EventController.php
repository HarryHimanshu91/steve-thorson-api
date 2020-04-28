<?php

namespace App\Http\Controllers\Admin\Community;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\Community\EventStoreRequest;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Store Events into the Database.
     */

    public function storeEvents(EventStoreRequest $request)
    {
        $event = Event::create($request->eventData());

        if($event){
            $notification = array(
                'message' => 'Success ! Event has been added successfully', 
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

    public function showEvent($id,$cId)
    {
        $communityId = $cId;
        $events = Event::whereId($id)->with('contents','community')->first();
        return view('community.events.show',compact('events','communityId'));
    }

    
}
