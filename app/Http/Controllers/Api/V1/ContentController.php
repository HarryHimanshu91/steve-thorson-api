<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    /**
     *  This function return the content list.
     *
     * @return JsonResponse
     */
    public function contents()
    {
        try{
            $contents = Content::all();
            $data = [
                'success' => true,
                'data' => $contents
            ];
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 200);
        }
    }
}
