<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\StoreContentRequest;
use App\Http\Requests\Admin\StoreLanguageSecondRequest;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Language;
use Illuminate\Support\Str;

class ContentController extends Controller
{
     /**
     * Display Listing of the Contents.
     *
     */
    public function index()
    {
        $contents = Content::with('language')->get();
        return view('contents.view')->with('contents', $contents);
    }

     /**
     * Display Forms For Creating Contents.
     *
     */
    public function create()
    {
        return view('contents.create');
    }

     /**
     * Save Contents Data of Language 1 in Database.
     *
     */

    public function saveLanguage1(StoreContentRequest $request)
    {
        $content = Content::create($request->contentData());

        if($content){
            $notification = array(
                'message' => 'Success ! Content has been added successfully', 
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Error ! Something went wrong', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    
    /**
     * Save Contents Data of Language 2 in Database.
     *
     */

    public function saveLanguage2(StoreLanguageSecondRequest $request)
    {
        $content = Content::create($request->contentData());
 
         if($content){
             $notification = array(
                 'message' => 'Success ! Content has been added successfully', 
                 'alert-type' => 'success'
             );
             return redirect()->back()->with($notification);
         }else{
             $notification = array(
                 'message' => 'Error ! Something went wrong', 
                 'alert-type' => 'error'
             );
             return redirect()->back()->with($notification);
         }
    }

    /**
     * Show Edit Form With Unique Record Contents.
     *
     */

    public function editContent($id)
    {
        $content = Content::where('id', $id )->with('language')->first();
        return view('contents.edit', compact('content'));
    }

     /**
     * Update Record With Unique Id Contents.
     *
     */
    public function updateContent(Request $request , $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'cat_name' => 'required',
            'status' => 'required',
        ],
        [
            'title.required' => 'Oops! Please enter content title.',
            'description.required' => "Oops! Please enter content description.",
            'status.required' => 'Oops! Please select content status.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $content = Content::find($id);
        $content->title = $request->input('title');
        $content->description = $request->input('description');
        $content->cat_name = $request->input('cat_name');
        $content->status = $request->input('status');
        $content->language_id = $request->input('language_id');
        $content->save();

        $notification = array(
            'message' => 'Success ! Content has been updated successfully', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

     /**
     * Show Contents Description With Unique Id.
     *
     */

    public function showContent($id)
    {
        $content = Content::where('id', $id )->first();
        return view('contents.show',compact('content'));
    }

     /**
     * Delete Content Record With Unique Id.
     *
     */

    public function deleteContent($id)
    {
        $content = Content::find($id);
        $content->delete();
        $data = array(
            'status' => 200,
            'message' => 'Success! Content has been successfully deleted.'
        );
        return response()->json($data, 200);
    }
    

}
