<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function index(){
        $roles=Role::all();
        return view('admin.role.index',compact('roles'));
    }
    function add(){
        $permissions = Permission::all()->groupBy(function ($permission){
            return explode('.' ,$permission->slug)[0];
        });

        return view('admin.role.add',compact('permissions'));

    }
    function store(Request $request){
        $validated =$request->validate([
            'name' =>'required|unique:roles,name',
            'description' =>'required' ,
//            'permission_id' =>'nullable|array' ,
//            'permission_id.*'=>'exists:permission,id',

        ]);

        $role =Role::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);
        $role->permissions()->attach($request->input('permission_id'));
        return redirect()->route('role.index')->with('status','Added successful role');
//        dd($request->all());

    }
    function edit(Role $role){
        $permissions = Permission::all()->groupBy(function ($permission){
            return explode('.' ,$permission->slug)[0];
        });
        return view('admin.role.edit',compact('role','permissions'));
    }
    function update(Request $request,Role $role){
        $validated =$request->validate([
            'name' =>'required|unique:roles,name,'.$role->id,
//            'permission_id' =>'nullable|array' ,
//            'permission_id.*'=>'exists:permission,id',
        ]);
        $role->update([
            'name' => $request->input('name'),
            'description'=>$request->input('description'),
        ]);
        $role->permissions()->sync($request->input('permission_id', []));
        return redirect()->route('role.index')->with('status','Role update successfully');
    }
    function delete(Role  $role){
      $role->delete();
        return redirect()->route('role.index')->with('status','You have successfully deleted');
    }
}
