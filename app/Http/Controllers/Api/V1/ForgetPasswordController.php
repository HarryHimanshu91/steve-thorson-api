<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreForgetPasswordRequest;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Rules\FirebaseUIDRule;
use Carbon\Carbon;

class ForgetPasswordController extends Controller
{
    /**
     * Change Password for the user.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function forgetPassword(StoreForgetPasswordRequest $request){
        try{            
            $phone = $request->get('phone');
            $uid = User::wherePhone($phone)->pluck('uid')->first();
            if((new FirebaseUIDRule($phone))->passes('',$uid)){

                $user = User::wherePhone($phone)->with('region','center')->first();
                $tokenResult = $user->createToken(env('APP_NAME'));
                $token = $tokenResult->token;
                $token->expires_at = Carbon::now()->addWeeks(1);
                $token->save();
                $success['token'] = $tokenResult->accessToken;
                $success['token_type'] = "Bearer";
                $success['expires_at'] = Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString();

                $success['data'] = $user;
                return response()->json($success, 200);
            }else{
                return response()->json(['error' => 'Oops! Phone number is not registered at our system.'], 422);
            }
        }catch(\Exception $e){
            return response()->json(['errors' => array('message' => ['Oops! Something went wrong, please try again.'])], 401);
        }       
    }
}