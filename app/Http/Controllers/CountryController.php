<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function addCountry(){
        return view('admin.country/add-country');
    }
    public function saveCountry(request $request){
        $country = new country;

        $country->name=$request->name;

        if(!$country){
            return back()->with('message','Country details is not available'); 
        }
        try{
            
          $country->save();
          return back()->with('message','country added succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
    public function manageCountry(){
        $countries = Country::latest()->get();
        return view('admin.country/manage-country',compact('countries'));
    }
    public function editCountry($id){
        $edit_country = Country::find($id);
        return view('admin.country/edit-country',compact('edit_country'));
    }
    public function update(Request $request,$id){
        $editcountry = Country::find($id);
       
        $editcountry->name=$request->name;

        if(!$editcountry){
            return back()->with('message','country details is not available'); 
        }
        try{
            
            $editcountry->save();
          return back()->with('message','country updated succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','An error occured'); 

        }
        return redirect()->back();
    }
    public function delete($id){
        $delete = Country::find($id);
        $delete->delete();
        return redirect()->back()->with('message','country removed succesfully');

    }
}
