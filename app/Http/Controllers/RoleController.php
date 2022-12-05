<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Session;
    
class RoleController extends Controller
{
    
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }
    
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.roles.create',compact('permissions'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
    
        return redirect()->route('roles.index')->with('success','Role created successfully');
    }
    
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
    
        return view('admin.roles.edit',compact('role','permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        return redirect()->route('roles.index')->with('success','Role updated successfully');
    }
    public function destroy($id){
        $role = Role::find($id);
        if(!$role){
            Session::flash('error','Role not found');
            return back();
          }
     
        try{
            
            $role->delete();
            Session::flash('success','Role is successfully deleted ');
            return redirect('roles');
         

        }catch(\Exception $e){
            Session::flash('error',$e->getMessage());
            return redirect('roles');
        }
       

    }

    public function givePermission(Request $request){ 
        $request->validate([
            'role_id'=>'required',
            'permission_id'=>'required'
         ]);
        $permission= Permission::find($request->permission_id);
         if(!$permission){
            Session::flash('error','Permission  not found');
            return back();
         }

         $role=Role::find($request->role_id);

         if(!$role){
            Session::flash('error','ROle  not found');
            return back();
         }
       
        if($role->hasPermissionTo($permission->name)){
            Session::flash('success','Permission exists ');
            return redirect('roles.edit');
        }
        $role->givePermissionTo($permission->name);
        Session::flash('success','Permission granted successfully ');
            return redirect('roles');
    }
    public function revokePermission(Role $role, Permission $permission){
    
        $permission= Permission::find($permission);
         if(!$permission){
            Session::flash('error','Permission  not found and unnassigned');
            return back();
         }

         $role=Role::find($role);
         if(!$role){
            Session::flash('error','Role  not found');
            return back();
         }

        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            Session::flash('success','Permission revoked successfully ');
            return redirect('roles');
        }
        Session::flash('success','Permission do not exits ');
            return redirect('roles');
    }
}