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
        $contents = Content::orderBy('id','desc')->get();
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

    public function store(StoreContentRequest $request)
    {
        $content = Content::create($request->contentData());

        $fileName = time().'.'.$request->audio_english_file->getClientOriginalExtension();
        $path = asset('/uploads/audio/english/'.$fileName);
        $request->audio_english_file->move(public_path('uploads/audio/english/'), $fileName);
        $content->audio_english_file = $path;

        $fileName = time().'.'.$request->audio_swahili_file->getClientOriginalExtension();
        $path = asset('/uploads/audio/swahili/'.$fileName);
        $request->audio_swahili_file->move(public_path('uploads/audio/swahili/'), $fileName);
        $content->audio_swahili_file = $path;

        $content->save();

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
    public function update(Request $request , $id)
    {
        $validator = Validator::make($request->all(), [
            'english_title' => 'required|max:160|unique:contents,english_title,'.$id,
            'swahili_title' => 'required|max:160|unique:contents,swahili_title,'.$id,
            'english_description' => 'required',
            'swahili_description' => 'required',
            'cat_name' => 'required',
            'status' => 'required',
            'audio_english_file' => $request->hidden_english_file ? '' : 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
            'audio_swahili_file' => $request->hidden_swahili_file ? '' : 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
        ],
        [
            'cat_name.required' => 'Oops! Please select category.',
            'english_title.required' => 'Oops! Please enter content title for english.',
            'swahili_title.required' => 'Oops! Please enter content title for swahili.',
            'english_title.unique' => 'The english title has already been taken.',
            'swahili_title.unique' => 'The swahili title has already been taken.',
            'english_title.max' => 'Oops! The english title may not be greater than 160 characters',
            'swahili_title.max' => 'Oops! The swahili title may not be greater than 160 characters',
            'english_description.required' => "Oops! Please enter content description for english.",   
            'swahili_description.required' => "Oops! Please enter content description for swahili.",           
            'status.required' => 'Oops! Please select content status.',
            'audio_english_file.required' => 'Oops! Please select audio file in English Language.',
            'audio_english_file.mimes' => 'Oops! Please select valid audio file for english',
            'audio_swahili_file.required' => 'Oops! Please select audio file in Swahili Language.',
            'audio_swahili_file.mimes' => 'Oops! Please select valid audio file for swahili',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.editContent', $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $audioEnglishFile = $request->hidden_english_file;
        $audio_english_file = $request->file('audio_english_file');
        $audioSwahiliFile = $request->hidden_swahili_file;
        $audio_swahili_file = $request->file('audio_swahili_file');

        if($audio_english_file){
            $fileName = time().'.'.$request->audio_english_file->getClientOriginalExtension();
            $englishPath = asset('/uploads/audio/english/'.$fileName);
            $request->audio_english_file->move(public_path('uploads/audio/english/'), $fileName);
        }
        if($audio_swahili_file){
            $fileName = time().'.'.$request->audio_swahili_file->getClientOriginalExtension();
            $swahiliPath = asset('/uploads/audio/swahili/'.$fileName);
            $request->audio_swahili_file->move(public_path('uploads/audio/swahili/'), $fileName);
        }

        $form_data = array(
            'english_title'       =>   $request->english_title,
            'swahili_title'       =>   $request->swahili_title,
            'english_description' =>   $request->english_description,
            'swahili_description' =>   $request->swahili_description,
            'cat_name'    =>   $request->cat_name,
            'status'      =>   $request->status,
            'audio_english_file'  =>   empty($audio_english_file) ? $audioEnglishFile : $englishPath,
            'audio_swahili_file' => empty($audio_swahili_file) ? $audioSwahiliFile : $swahiliPath
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
