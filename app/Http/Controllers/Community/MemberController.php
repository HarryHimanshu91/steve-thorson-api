<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class MemberController extends Controller
{
    /**
     * Method to get unique Community with Members
     * @param $id
     */

    public function index()
    {
        $users = User::whereCenterId(Auth::user()->center_id)->get();
        return view('community.members.view')->with('users', $users);
    }
}
