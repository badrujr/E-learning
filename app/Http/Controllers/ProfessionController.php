<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profession;

class ProfessionController extends Controller
{
    public function addProfession(){
        return view('admin.profession/add-profession');
    }
    public function saveProfession(request $request){
        $profession = new Profession;

        $profession->name=$request->name;

        if(!$profession){
            return back()->with('message','Profession details is not available'); 
        }
        try{
            
          $profession->save();
          return back()->with('message','Profession added succesfully'); 

        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
    public function manageProfession(){
        $professions = Profession::latest()->get();
        return view('admin.profession/manage-profession',compact('professions'));
    }
}
