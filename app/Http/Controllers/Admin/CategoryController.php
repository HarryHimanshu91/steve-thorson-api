<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.view' ,compact('categories') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->categoryData());

        if($category){
            $notification = array(
                'message' => 'Success ! Content has been added successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.category.create')->with($notification);
        }else{
            $notification = array(
                'message' => 'Error ! Something went wrong', 
                'alert-type' => 'error'
            );
            return redirect()->route('admin.category.create')->with($notification)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id', $id )->first();
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'cat_name' => 'required',


            // 'email' => ['required','email','unique:users,email,'.$category->id]
        ],
        [
            'title.required' => 'Oops! Please enter content title.',
            'description.required' => "Oops! Please enter content description.",
            'cat_name.required' => 'Oops! Please select category.'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.category.edit', $category->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $category->fill([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'cat_name' => $request->get('cat_name')
            
        ])->save();

        $notification = array(
            'message' => 'Success ! Content has been updated successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('admin.category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        $notification = array(
            'message' => 'Success ! Content has been Deleted successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('admin.category.index')->with($notification);
    }
}
