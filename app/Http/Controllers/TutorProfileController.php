<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Profession;
use App\Models\TutorProfile;

class TutorProfileController extends Controller
{
    //
    public function addTutorProfile(){
        $tutors = Tutor::all();
        return view('admin.tutorProfile/add-tutor-profile',compact('tutors'));
    }
    public function saveTutorProfile(request $request){
        $tutorProfile = new TutorProfile;

        $tutorProfile->tutor_id=$request->tutor_id;

        $tutorProfile->biography=$request->biography;

        if(!$tutorProfile){
            return back()->with('message','biography details is not available'); 
        }
        try{
            
          $tutorProfile->save();
          return back()->with('message','biography added succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
    public function manageTutorProfile(){
        $tutorProfiles = TutorProfile::latest()->get();
        return view('admin.tutorProfile/manage-tutor-profile',compact('tutorProfiles'));
    }
}
