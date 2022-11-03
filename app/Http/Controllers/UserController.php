<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function addUser(){
        return view('admin.users/add-user');
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

    public function manageUser(){
        $users = User::latest()->get();
        return view('admin.users/manage-user',compact('users'));
    }
    public function editUser($id){
        $edit_user = User::find($id);
        return view('admin.users/edit-user',compact('edit_user'));
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
    public function delete($id){
        $delete = User::find($id);
        if(!$delete){
            return back()->with('message','user details is not available'); 
        }
        try{
            
          $delete->delete();
          return back()->with('message','user removed succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','You can not delete this information'); 

        }

    }
}
