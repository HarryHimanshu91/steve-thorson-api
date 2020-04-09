<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\StoreContentRequest;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    /**
     * Display a listing of the contents.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::all();
        return view('content.view' ,compact('contents') );
    }

    /**
     * Show the form for creating a new content.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('content.create');
    }

    /**
     * Store a newly created content in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContentRequest $request)
    {
        $content = Content::create($request->contentData());

        if($content){
            $notification = array(
                'message' => 'Success ! Content has been added successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.content.create')->with($notification);
        }else{
            $notification = array(
                'message' => 'Error ! Something went wrong', 
                'alert-type' => 'error'
            );
            return redirect()->route('admin.content.create')->with($notification)->withInput();
        }
    }

    /**
     * Show the content with unique Id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $content = Content::where('id', $id )->first();
       return view('content.show',compact('content'));
        
    }

    /**
     * Show the form for editing the specified content.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::where('id', $id )->first();
        return view('content.edit', compact('content'));
    }

    /**
     * Update the specified content in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'cat_name' => 'required',
        ],
        [
            'title.required' => 'Oops! Please enter content title.',
            'description.required' => "Oops! Please enter content description.",
            'cat_name.required' => 'Oops! Please select category.'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.content.edit', $content->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $content->fill([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'cat_name' => $request->get('cat_name')
            
        ])->save();

        $notification = array(
            'message' => 'Success ! Content has been updated successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('admin.content.index')->with($notification);
    }

    /**
     * Remove the specified content from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);
        $content->delete();
        $notification = array(
            'message' => 'Success ! Content has been Deleted successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('admin.content.index')->with($notification);
    }
}
