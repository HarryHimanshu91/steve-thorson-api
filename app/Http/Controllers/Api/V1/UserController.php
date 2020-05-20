<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Api\V1\Register\StoreRegisterRequest;
use App\Http\Requests\Api\V1\LoginUserRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Session;
use Laravel\Passport\HasApiTokens;
use App\Rules\FirebaseUIDRule;

class UserController extends Controller
{
    use HasApiTokens;
    /**
     *  This constant variable is declared for success status.
     *
     *  @param $successStatus
    */
    public $successStatus = 200;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * register api
     * 
     * @param StoreRegisterRequest $request
     * @return JsonResponse
     * 
     */

    public function register(StoreRegisterRequest $request){
        try{
            if($request->registerData()['uid']){
                if((new FirebaseUIDRule($request->registerData()['phone']))->passes('',$request->registerData()['uid'])){

                    $user = User::create($request->registerData());
                    
                    if($request->image){
                        $fileName = time().'.'.$request->image->getClientOriginalExtension();
                        $path = asset('/uploads/profiles/'.$fileName);
                        $request->image->move(public_path('uploads/profiles/'), '/profiles/'.$fileName);

                        User::find($user->id)->update([
                            'profile_path' => $path
                        ]);
                    }

                    $user = User::whereId($user->id)->with('region','center')->first();
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
                    return response()->json(['error' => 'Oops! Phone number is not verified.'], 422);
                }
            }
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 403);
        }
    }

    /**
     *  This function is create to check the user role.
     * 
     * @param LoginUserRequest $request
     * @return JsonResponse
     */

    public function checkUserLogin(LoginUserRequest $request)
    {
        try {
            $uid = User::wherePhone($request->loginData()['phone'])->pluck('uid')->first();
            if((new FirebaseUIDRule($request->loginData()['phone']))->passes('',$uid)){
                if(Auth::attempt($request->loginData())){ 
                    $user = Auth::user();
                    $tokenResult = $user->createToken(env('APP_NAME'));
                    $token = $tokenResult->token;
                    $token->expires_at = Carbon::now()->addWeeks(1);
                    $token->save();
                    $success['token'] = $tokenResult->accessToken;
                    $success['token_type'] = "Bearer";
                    $success['expires_at'] = Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString();   
                    $user = User::whereId($user->id)->with('region','center')->first();
                    $success['data'] = $user;
                    // $success['data']->store = Store::with('locations')->find(User::find($user->id)->pluck('store_id'))->first();
                    return response()->json($success, 200);
                }else{
                    return response()->json(['errors' => array('phone' => ['Oops! Either the phone number or password you entered is incorrect.'])], 401);
                }   
            }else{
                return response()->json(['errors' => array('phone' => ['Oops! the phone number is not verified.'])], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong.'], 403);
        }
    }

    /**
     * This function is create for logout user.
     * 
     * @return JsonResponse
     */

    public function logout(){
        try{
            $user = Auth::user()->token();
            $user->revoke();
            return response()->json(['success'=>"successfully logout"], 200);  
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 401);
        }
    }
}
