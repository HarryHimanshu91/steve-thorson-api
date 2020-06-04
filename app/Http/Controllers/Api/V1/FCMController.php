<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use App\Models\DeviceToken;
use Auth;

class FCMController extends Controller
{
    /**
     * the method used to save fcm token into records
     * 
     * @param Request $request
     * 
     * @return JsonResponse
     */

    public function saveToken(Request $request){
        $validator = Validator::make($request->all(), [
            'token' => 'required'           
        ],
        [
            'token.required' => 'Oops! The device token is required.'
        ]);

        if ($validator->fails()) {
            $errors = (new ValidationException($validator))->errors();

            throw new HttpResponseException(
                response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }

        try{
            if(DeviceToken::whereUserId(Auth::user()->id)->doesntExist()){
                DeviceToken::create([
                    'user_id' => Auth::user()->id,
                    'token' => $request->token
                ])->save();                
            }else{
                DeviceToken::whereUserId(Auth::user()->id)->update([
                    'token' => $request->token
                ]); 
            }
            $data['success'] = 'Device Token saved successfully';
            return response()->json($data, 200);
        }catch(\Exception $e){
            $data['errors'] = "Something went wrong ".$e->getMessage();
            return response()->json($data, 401);
        }
    }
}
