<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\StoreUserRequest;
use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUser;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return view
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('users.view')->with('users',$users);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return view
     */
    public function create()
    {
        $roles = Role::whereStatus(1)->get();
        return view('users.create')->with(['roles'=>$roles]);
    }

    /**
     * Store a newly created user in database.
     *
     * @param  StoreUserRequest  $request
     * @return \Illuminate\Http\Redirect
     */
    public function store(StoreUserRequest $request)
    {  
        $user = User::create($request->userData());
        
        if($user){
            // Mail::to($user->email)->send(new NewUser($request->get('email'), env('NEW_USER_DEFAULT_PASSWORD')));
            $notification = array(
                'message' => 'Success ! User has been created successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.users.create')->with($notification);
        }else{
            $notification = array(
                'message' => 'Error ! Something went wrong', 
                'alert-type' => 'error'
            );
            return redirect()->route('admin.users.create')->with($notification)->withInput();
        }
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  User  $user
     * @return view
     */
    public function edit(User $user)
    {
        $roles = Role::whereStatus(1)->get();
        return view('users.edit')->with(['user'=>$user,'roles'=>$roles]);
    }

    /**
     * Update the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Redirect
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => ['required','email','unique:users,email,'.$user->id]
        ],
        [
            'name.required' => 'Oops! Please enter name.',
            'email.required' => "Oops! Please enter email address.",
            'email.email' => "Oops! Please enter valid email address.",
            'email.unique' => "Oops! The enter email address is already exists."
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.edit', $user->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $user->fill([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role_id' => $request->get('role'),
            'status' => $request->get('status')
        ])->save();

        $notification = array(
            'message' => 'Success ! User has been updated successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('admin.users.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $data = array(
            'status' => 200,
            'message' => 'Success! User has been successfully deleted.'
        );
        return response()->json($data, 200);
    }
}
