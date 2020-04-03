<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     *  This function return the language list.
     *
     * @return JsonResponse
     */
    public function languageList()
    {
        $language_list = Language::all()->toArray();

        return response([
            'status' => 'success',
            'data' => $language_list
        ]);

    }
}
