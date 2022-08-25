<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // for ($i=0; $i < 11; $i++) {
        //   Role::create([
        //     'name' => Str::random(20)
        //   ]);
        // }
        // Permission::create([
        //   'name' => 'can delete role'
        // ]);
        // auth()->user()->assignRole('Family');
        return view('backend.role.index', [
          'permissions' => Permission::select('id','name')->get(),
          'roles' => Role::select('id','name')->with('users')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'role_title' => 'required|unique:roles,name'
        ]);
        $role = Role::create(['name' => Str::title($request->role_title)]);
        $role->syncPermissions($request->permission);
        (isset($request->permission)) ? $total_permissions = count($request->permission) : $total_permissions = 0;
        return back()->with([
          'role_success' => $role->name,
          'total_permissions' => $total_permissions
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required|unique:roles,name,'.$id.',id'
        ]);
        $role = Role::find($id)->syncPermissions($request->permission);
        $role->name = Str::title($request->role_name);
        $role->save();
        return back()->with('role_update_success', $request->role_name. " Role Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Role::find($id)->delete();
      return back()->with('role_delete_success', " Role Deleted Successfully!");
    }
}
