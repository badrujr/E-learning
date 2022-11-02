<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    public function addLevel(){
        return view('admin.level/add-level');
    }
    public function saveLevel(request $request){
        $level = new Level;

        $level->name=$request->name;

        if(!$level){
            return back()->with('message','course level details is not available'); 
        }
        try{
            
          $level->save();
          return back()->with('message','course level added succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }

    public function manageLevel(){
        $levels = Level::latest()->get();
        return view('admin.level/manage-level',compact('levels'));
    }
    public function editLevel($id){
        $edit_level = Level::find($id);
        return view('admin.level/edit-level',compact('edit_level'));
    }
    public function update(Request $request,$id){
        $editlevel = Level::find($id);
       
        $editlevel->name=$request->name;

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
        $delete = Level::find($id);
        if(!$delete){
            return back()->with('message','level details is not available'); 
        }
        try{
            
          $delete->delete();
          return back()->with('message','level removed succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','You can not remove this information due to the relationship'); 

        }

    }
}
