<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\StoreUserRequest;
use Illuminate\Http\Request;
use App\Admin;
use App\Models\Role;
use App\Models\Community;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminUserMail;

class AdminController extends Controller
{
    /**
     * Display a listing of the admin.
     *
     * @return view
     */
    public function index()
    {
        $admins = Admin::with('role')->get();
        return view('admins.view')->with('admins',$admins);
    }
 
    /**
     * Show the form for creating a new admin.
     *
     * @return view
     */
    public function create()
    {
        $roles = Role::whereStatus(1)->get();
        $communities = Community::all();
        return view('admins.create')->with(['roles'=>$roles,'communities'=>$communities]);
    }

    /**
     * Store a newly created admin in database.
     *
     * @param  StoreUserRequest  $request
     * @return \Illuminate\Http\Redirect
     */
    public function store(StoreUserRequest $request)
    {  
        $data = $request->userData();
        $user = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'center_id' => $data['center_id'],
            'password' => \Hash::make($data['password']),
            'status' => $data['status']
        ]);        
                        
        if($user){
            Mail::to($user->email)->send(new AdminUserMail($request->get('email'), $data['password']));
            $notification = array(
                'message' => 'Success ! User has been created successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.admins.create')->with($notification);
        }else{
            $notification = array(
                'message' => 'Error ! Something went wrong', 
                'alert-type' => 'error'
            );
            return redirect()->route('admin.admins.create')->with($notification)->withInput();
        }
    }

    /**
     * Show the form for editing the specified admin.
     *
     * @param  User  $user
     * @return view
     */
    public function edit(Admin $admin)
    {
        $roles = Role::whereStatus(1)->get();
        $communities = Community::all();
        return view('admins.edit')->with(['admin'=>$admin,'roles'=>$roles,'communities'=>$communities]);
    }

    /**
     * Update the specified admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Redirect
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:160|string',
            'email' => ['required','email','unique:admins,email,'.$id],
            'community' => 'required_if:role,2'
        ],
        [
            'name.required' => 'Oops! Please enter name.',
            'name.max' => 'Oops! The name may not be greater than 160 characters.',
            'email.required' => "Oops! Please enter email address.",
            'email.email' => "Oops! Please enter valid email address.",
            'email.unique' => "Oops! The enter email address is already exists.",
            'community.required_if' => 'Oops! Please select community when role is community.'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.admins.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        Admin::whereId($id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role_id' => $request->get('role'),
            'center_id' => $request->get('role') == '2' ? $request->get('community') : NULL,
            'status' => $request->get('status')
        ]);

        $notification = array(
            'message' => 'Success ! User has been updated successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('admin.admins.index')->with($notification);
    }

    /**
     * Remove the specified admin from database.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        $data = array(
            'status' => 200,
            'message' => 'Success! User has been successfully deleted.'
        );
        return response()->json($data, 200);
    }
}
