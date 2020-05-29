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
            $contents = Community::whereId($id)->with('mapdata','events','notifications')->first()->toArray();
            $data = $this->group_by('category', $contents['mapdata']);
            $contents['mapdata'] = $data;
            $data = [
                'success' => true,
                'data' => $contents
            ];
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 422);
        }
    }

    public function group_by($key, $data) {
        $result = array();
        foreach($data as $val) {
            if (is_object($val)) {
                $val = get_object_vars($val);
            }
            if(array_key_exists($key, $val)){
                $result[$val[$key]][] = $val;
            }else{
                $result[""][] = $val;
            }
        }
    
        return $result;
    }
}
