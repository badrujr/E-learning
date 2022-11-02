<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\TutorProfile;
use App\Models\Profession;

class TutorController extends Controller
{
    //
    public function addTutor(){
        $professions = Profession::all();
        return view('admin.tutor/add-tutor',compact('professions'));
    }
    public function saveTutor(request $request){
        $tutor = new Tutor;

        $image = $request->file;
    
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('tutorimage',$imagename);
        $tutor->image=$imagename;

        $tutor->name=$request->name;

        $tutor->profession_id=$request->profession_id;

        $tutor->email=$request->email;

        if(!$tutor){
            return back()->with('message','tutor details is not available'); 
        }
        try{
            
          $tutor->save();
          return back()->with('message','tutor added succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
    public function manageTutor(){
        $tutorProfiles = TutorProfile::latest()->get();
        return view('admin.tutor/manage-tutor',compact('tutorProfiles'));
    }
}
