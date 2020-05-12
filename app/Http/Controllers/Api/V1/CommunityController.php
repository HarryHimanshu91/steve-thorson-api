<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Community;

class CommunityController extends Controller
{
     /**
     *  This function return the events and notification lists related to Community.
     *
     * @return JsonResponse
     */
    public function community($id)
    {
        try{
            $contents = Community::whereId($id)->with('mapdata','events','notifications')->first();
            $data = [
                'success' => true,
                'data' => $contents
            ];
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 422);
        }
    }
}
