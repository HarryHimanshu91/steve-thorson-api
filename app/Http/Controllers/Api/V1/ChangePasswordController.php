<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreChangePasswordRequest;
use Illuminate\Http\Request;
use Auth;
use App\User;

class ChangePasswordController extends Controller
{
    /**
     * Change Password for the user.
     *
     * @param StoreChangePasswordRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(StoreChangePasswordRequest $request){
        try{            
            User::find(Auth::user()->id)->update([
                'password' => \Hash::make($request->get('cpass'))
            ]);
            return response()->json(['success' => array('message' => ['Success! Password has been changed successfully.'])], 200);
        }catch(\Exception $e){
            return response()->json(['errors' => array('message' => ['Oops! Something went wrong, please try again.'])], 401);
        }       
    }
}
