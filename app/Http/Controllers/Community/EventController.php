<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Community\EventStoreRequest;
use App\Models\Event;
use App\Models\Content;
use Auth;

class EventController extends Controller
{
    /**
     * Get all Events
     */
    public function index(){
        $events = Event::whereCenterId(Auth::user()->center_id)->get();
        $contents = Content::all();
        return view('community.events.create')->with(['id'=>Auth::user()->center_id,'events' => $events,'contents' => $contents]);
    }

    /**
     * Display specific Events with Unique Id.
     */

    public function show($id, $cId)
    {
        $communityId = $cId;
        $events = Event::whereId($id)->with('contents','community')->first();
        return view('community.events.show',compact('events','communityId'));
    }

    /**
     * Store Events into the Database.
     */

    public function store(EventStoreRequest $request)
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
}
