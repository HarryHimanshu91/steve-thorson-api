<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    /**
     *  This function return the region list.
     *
     * @return JsonResponse
     */
    public function regions()
    {
        try{
            $regions = Region::with('center')->get();
            $data = [
                'success' => true,
                'data' => $regions
            ];
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 200);
        }
    }
}
