<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use Session;

class LevelController extends Controller
{
    public function create(){
        return view('admin.levels/create');
    }
    public function store(request $request){

        $request->validate([
            'name'=>'required|max:50|unique:levels'
         ]);

        $level = new Level;
        $level->name=$request->name;
        

        if(!$level){
            return back()->with('message','course level details is not available'); 
        }
        try{
            
            $level->save();
            Session::flash('success','course level is successfully saved');
            return redirect('levels'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }

    public function index(){
        $levels = Level::latest()->get();
        return view('admin.levels/index',compact('levels'));
    }
    public function edit($id){
        $level = Level::find($id);
        if(!$level){
            Session::flash('error','Level not found');
            return back();
          }
          return view('admin.levels/edit',compact('level'));
        }

    public function update(Request $request,$id){
        $level = Level::find($id);
       
        if(!$level){
            Session::flash('error','Level not found');
            return back();
          }
        $request->validate([
            'name'=>'required|max:50|unique:levels,name,'.$id,

         ]);
       
        $level->name=$request->name;
        $level->save();

        Session::flash('success','Level is successfully updated');
        return redirect()->route('levels.index');
       
    }
    public function destroy($id){
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
