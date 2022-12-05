<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Session;
class PermissionController extends Controller
{
    //
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }
    
    public function create()
    {
        return view('admin.permissions.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
         ]);

        $permission = new Permission;

        $permission->name=$request->name;
        $permission->save();
    
        return redirect()->route('permissions.index')->with('success','Permission created successfully');
    }

    
    public function edit($id)
    {
        $permission = Permission::find($id);
        $roles = Role::all();
    
        return view('admin.permissions.edit',compact('roles','permission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
    
        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();
    
        return redirect()->route('permissions.index')->with('success','Permission updated successfully');
    }

    public function destroy($id){
        $permission = Permission::find($id);
        if(!$permission){
            Session::flash('error','Permission not found');
            return back();
          }
     
        try{
            
            $permission->delete();
            Session::flash('success','Permission is successfully deleted ');
            return redirect('permissions');
         

        }catch(\Exception $e){
            Session::flash('error',$e->getMessage());
            return redirect('permissions');
        }
       

    }

    public function assignRole(Request $request){
        $request->validate([
            'role_id'=>'required',
            'permission_id'=>'required'
         ]);
        $role= Role::find($request->role_id);
         if(!$role){
            Session::flash('error','Role  not found');
            return back();
         }

         $permission=Permission::find($request->permission_id);

         if(!$permission){
            Session::flash('error','Permission  not found');
            return back();
         }
       
        if($permission->hasRole($role->name)){
            Session::flash('success','Role exists ');
            return redirect('permissions.edit');
        }
        $permission->assignRole($role->name);
        Session::flash('success','Role assign granted successfully ');
            return redirect('permissions');
    }

    public function removeRole(Permission $permission, Role $role){
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            Session::flash('success','Role removed successfully ');
            return redirect('permissions.edit');
        }
        Session::flash('error','Role does not exists ');
            return redirect('permissions.edit');
    }
}