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
}
