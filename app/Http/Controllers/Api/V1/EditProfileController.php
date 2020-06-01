<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Auth;
use App\User;

class EditProfileController extends Controller
{
    /** 
     * This function is to edit the user profile.
     * 
     * @return JsonResponse
     */

    public function index(Request $request){
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|unique:users,phone,'.Auth::user()->id,
            'region' => 'required',
            'center' => 'required',
            'image' => 'mimes:jpeg,png,jpg'
        ],
        [  
            'firstname.required' => 'Oops! Please enter email address.',
            'lastname.required' => 'Oops! Please enter email address.',
            'phone.required' => 'Oops! Please enter phone number.',
            'phone.unique' => "Oops! The phone number you entered is already registered with us.",
            'region.required' => 'Oops! Please select the region.',
            'center.required' => 'Oops! Please select the center.',
            'image.mimes' => 'Oops! please select only jpeg, png & jpg image.'
        ]);

        if ($validator->fails()) {
            $errors = (new ValidationException($validator))->errors();

            throw new HttpResponseException(
                response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }

        try{
            if($request->image){
                $fileName = time().'.'.$request->image->getClientOriginalExtension();
                $path = asset('/uploads/profiles/'.$fileName);
                $request->image->move(public_path('uploads/profiles/'), '/profiles/'.$fileName);

                User::find(Auth::user()->id)->update([
                    'firstname' => $request->get('firstname'),
                    'lastname' => $request->get('lastname'),
                    'phone' => $request->get('phone'),
                    'region_id' => $request->get('region'),
                    'center_id' => $request->get('center'),
                    'profile_path' => $path
                ]);
            }else{
                User::find(Auth::user()->id)->update([
                    'firstname' => $request->get('firstname'),
                    'lastname' => $request->get('lastname'),
                    'phone' => $request->get('phone'),
                    'region_id' => $request->get('region'),
                    'center_id' => $request->get('center'),
                ]);
            }

            $success['data'] = "Success! User profile has been updated.";
            return response()->json($success, 200);
        }catch(\Exception $e){
            $errors['data'] = "Something went wrong.";
            return response()->json($errors, 403);
        }
    }
}
