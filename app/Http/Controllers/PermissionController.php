<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Session;
class PermissionController extends Controller
{
    function add(){
        return view('permission.add' );
    }

    function  addRequest(Request $request){
        $permission = Permission::create(['name' => $request->name]);
        Session::flash('success', 'Thêm quyền thành công!');
        return redirect('/role');
    }
}
