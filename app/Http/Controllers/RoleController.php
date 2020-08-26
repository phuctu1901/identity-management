<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
class RoleController extends Controller
{
    function index(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('role.index',['roles'=>$roles, 'permissions'=>$permissions]);
    }

    function add(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('role.add', ['roles'=>$roles, 'permissions'=>$permissions]);
    }

    function edit($id){
        $role = Role::findById($id);
        $permissions = Permission::all();
        return view('role.edit', ['role'=>$role, 'permissions'=>$permissions]);
    }

    function delete(Request $request)
    {
        $id = $request->id;
//        User::find($request->id)->delete();
        $role = Role::findById($id);
        $role->delete();
        return redirect()->back()->with('success','User deleted successfully');
    }

    function editRequest(Request $request){
        $role = Role::findById($request->id);
        $permissions = collect([]);
        foreach($request->permissions as $permission_id){

            $permission = Permission::findById((int)($permission_id));
            $permissions->push($permission);
        }
        $role->syncPermissions($permissions);
        Session::flash('success', 'Sủa loại tài khoản thành công!');
        return redirect('/role');
    }

    function addRequest(Request $request){
        $role = Role::create(['name' => $request->name]);

        foreach($request->permissions as $permission_id){
            $permission = Permission::findById((int)($permission_id));
            $permission->assignRole($role);
        }
        Session::flash('success', 'Thêm loại tài khoản thành công!');
        return redirect('/role');
    }
}
