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
    public function editProfession($id){
        $edit_profession = Profession::find($id);
        return view('admin.profession/edit-profession',compact('edit_profession'));
    }
    public function update(Request $request,$id){
        $editprofession = Profession::find($id);
       
        $editprofession->name=$request->name;

        if(!$editprofession){
            return back()->with('message','profession details is not available'); 
        }
        try{
            
            $editprofession->save();
          return back()->with('message','profession updated succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','An error occured'); 

        }
        return redirect()->back();
    }
    public function delete($id){
        $delete = Profession::find($id);
        if(!$delete){
            return back()->with('message','profession details is not available'); 
        }
        try{
            
          $delete->delete();
          return back()->with('message','profession removed succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','You can not remove this information due to the relationship'); 

        }

    }
}
