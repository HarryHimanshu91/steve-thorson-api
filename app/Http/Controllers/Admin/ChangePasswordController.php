<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreChangePasswordRequest;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return view
     */
    public function index()
    {
        return view('settings.change_password');
    }

    /**
     * Update the password.
     *
     * @return \Illuminate\Http\Redirect
     */
    public function updatePassword(StoreChangePasswordRequest $request)
    {
        Admin::find(Auth::user()->id)->update([
            'password' => \Hash::make($request->get('cpass'))
        ]);

        $notification = array(
            'message' => 'Success ! Password has been updated successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->route('admin.change-password')->with($notification);
    }
}
