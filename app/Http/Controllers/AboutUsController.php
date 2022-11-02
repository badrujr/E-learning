<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function addAboutUs(){
        return view('admin.about/add-about');
    }
    public function saveAboutUs(request $request){
        $aboutUs = new AboutUs;

        $aboutUs->title=$request->title;

        $aboutUs->description=$request->description;

        if(!$aboutUs){
            return back()->with('message','About us details is not available'); 
        }
        try{
            
            $aboutUs->save();
          return back()->with('message','about us added succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
    public function manageAboutUs(){
        $aboutUs = AboutUs::latest()->get();
        return view('admin.about/manage-about',compact('aboutUs'));
    }
}
