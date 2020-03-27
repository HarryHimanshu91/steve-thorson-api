<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the Roles.
     *
     * @return view
     */
    public function index()
    {
        $roles = Role::orderBy('id','desc')->get();
        return view("roles.view")->with('roles', $roles);
    }

    /**
     * Show the form for creating a new role.
     *
     * @return view
     */
    public function create()
    {
        return view("roles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRoleRequest $request
     * @return \Illuminate\Http\Redirect
     */
    public function store(StoreRoleRequest $request){      
   
        $role = Role::create($request->roleData());

        if($role){
            $notification = array(
                'message' => 'Success ! Role has been added successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.roles.create')->with($notification);
        }else{
            $notification = array(
                'message' => 'Error ! Something went wrong', 
                'alert-type' => 'error'
            );
            return redirect()->route('admin.roles.create')->with($notification)->withInput();
        }
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit')->with('role',$role);
    }

    /**
     * Update the specified role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role  $role
     * @return \Illuminate\Http\Redirect
     */
    public function update(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'role' => ['required','unique:roles,name,'.$role->id],
            'status' => ['required']
        ],
        [
            'role.required' => 'Oops! Please enter role.',
            'status.required' => 'Oops! Please select status'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.roles.edit', $role->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $role->fill([
            'name' => $request->get('role'),
            'status' => $request->get('status')
        ]);
        $role->save();
        $notification = array(
            'message' => 'Success ! Role has been updated successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('admin.roles.index')->with($notification);
    }
}
