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

        $fileName = time().'.'.$request->audio_file->getClientOriginalExtension();
        $path = asset('/uploads/audio/english/'.$fileName);
        $request->audio_file->move(public_path('uploads/audio/english/'), $fileName);
        $content->audio_file = $fileName;

        $content->save();

        if($content){
            $notification = array(
                'message' => 'Success ! Language 1 Content has been added successfully', 
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

        $fileName = time().'.'.$request->audio_file->getClientOriginalExtension();
        $path = asset('/uploads/audio/swahili/'.$fileName);
        $request->audio_file->move(public_path('uploads/audio/swahili/'), $fileName);
        $content->audio_file = $fileName;
        
        $content->save();

         if($content){
             $notification = array(
                 'message' => 'Success ! Language 2 Content has been added successfully', 
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
        $audioFile = $request->hidden_image;
        $audio_file = $request->file('audio_file');
        if($audio_file != '')
        {
            $request->validate([
                'title' => 'required|max:160',
                'description' => 'required',
                'cat_name' => 'required',
                'status' => 'required',
                'audio_file' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
            ]);

            $audioFile = rand() . '.' . $audio_file->getClientOriginalExtension();
           
            if($request->language_id=='1'){
                $audio_file->move(public_path('uploads/audio/english/'), $audioFile);
            }else{
                $audio_file->move(public_path('uploads/audio/swahili/'), $audioFile);
            }
        }
        else
        {
            $request->validate([
                'title' => 'required|max:160',
                'description' => 'required',
                'cat_name' => 'required',
                'status' => 'required',
            ]);
        }

        $form_data = array(
            'title'       =>   $request->title,
            'description' =>   $request->description,
            'cat_name'    =>   $request->cat_name,
            'status'      =>   $request->status,
            'language_id' =>   $request->language_id,
            'audio_file'  =>   $audioFile
        );
  
        Content::whereId($id)->update($form_data);
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
