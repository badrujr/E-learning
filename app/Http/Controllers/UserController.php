<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;

class UserController extends Controller
{
    public function create(){
        return view('admin.users/create');
    }
    public function saveUser(request $request){
        $user = new User;

        $user->name=$request->name;

        if(!$user){
            return back()->with('message','course level details is not available'); 
        }
        try{
            
          $user->save();
          return back()->with('message','course level added succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }

    public function index(){
        $users = User::latest()->get();
        return view('admin.users/index',compact('users'));
    }
    public function show($id){
        $roles = Role::all();
        $permissions = Permission::all();
        $user = User::find($id);
        return view('admin.users/show',compact('user','roles','permissions'));


    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.users/edit',compact('user'));
    }
    public function update(Request $request,$id){
        $editUser = User::find($id);
       
        $editUser->name=$request->name;

        if(!$editlevel){
            return back()->with('message','level details is not available'); 
        }
        try{
            
            $editlevel->save();
          return back()->with('message','level updated succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','An error occured'); 

        }
        return redirect()->back();
    }
    public function destroy($id){
        $user = User::find($id);
        if(!$user){
            Session::flash('error','User not found');
            return back();
          }
          elseif($user->hasRole('admin')){
            Session::flash('success','Your an admin!');
            return redirect('users');
          }
     
        try{
            
            $user->delete();
            Session::flash('success','User is successfully deleted ');
            return redirect('users');
         

        }catch(\Exception $e){
            Session::flash('error',$e->getMessage());
            return redirect('users');
        }
       

    }

    public function assignRole(Request $request){
        $request->validate([
            'role_id'=>'required',
            'user_id'=>'required'
         ]);
        $role= Role::find($request->role_id);
         if(!$role){
            Session::flash('error','Role  not found');
            return back();
         }

         $user=User::find($request->user_id);

         if(!$user){
            Session::flash('error','User not found');
            return back();
         }
       
        if($user->hasRole($role->name)){
            Session::flash('success','Role exists ');
            return redirect('users.edit');
        }
        $user->assignRole($role->name);
        Session::flash('success','User role assign granted successfully ');
            return redirect('users');
    }

    public function removeRole(User $user, Role $role){
        if($user->hasRole($role)){
            $user->removeRole($role);
            Session::flash('success','User Role removed successfully ');
            return redirect('users.edit');
        }
        Session::flash('error','User Role does not exists ');
            return redirect('users.edit');
    }

    public function givePermission(Request $request){ 
        $request->validate([
            'user_id'=>'required',
            'permission_id'=>'required'
         ]);
        $permission= Permission::find($request->permission_id);
         if(!$permission){
            Session::flash('error','Permission  not found');
            return back();
         }

         $user=User::find($request->user_id);

         if(!$user){
            Session::flash('error','User  not found');
            return back();
         }
       
        if($user->hasPermissionTo($permission->name)){
            Session::flash('success','Permission exists ');
            return redirect('users.edit');
        }
        $user->givePermissionTo($permission->name);
        Session::flash('success','Permission granted successfully ');
            return redirect('users');
    }
    public function revokePermission(User $user, Permission $permission){
    
        $permission= Permission::find($permission);
         if(!$permission){
            Session::flash('error','Permission  not found and unnassigned');
            return back();
         }

         $user=User::find($user);
         if(!$user){
            Session::flash('error','User  not found');
            return back();
         }

        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            Session::flash('success','Permission revoked successfully ');
            return redirect('users');
        }
        Session::flash('success','Permission do not exits ');
            return redirect('users');
    }
}
