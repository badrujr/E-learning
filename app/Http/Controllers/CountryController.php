<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Session;

class CountryController extends Controller
{
    public function create(){
        return view('admin.countries/create');
    }
    public function store(request $request){

        $request->validate([
            'name'=>'required|max:50|unique:countries'
         ]);

        $country = new Country;
        $country->name=$request->name;
        

        if(!$country){
            return back()->with('message','country details is not available'); 
        }
        try{
            
            $country->save();
            Session::flash('success','country is successfully saved');
            return redirect('countries'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
    public function index(){
        $countries = Country::latest()->get();
        return view('admin.countries/index',compact('countries'));
    }
    public function edit($id){
        $country = Country::find($id);
        return view('admin.countries/edit',compact('country'));
    }
    public function update(Request $request,$id){
        $country = Country::find($id);
       
        if(!$country){
            Session::flash('error','Country not found');
            return back();
          }
        $request->validate([
            'name'=>'required|max:50|unique:countries,name,'.$id,

         ]);
       
        $country->name=$request->name;
        $country->save();

        Session::flash('success','Country is successfully updated');
        return redirect()->route('countries.index');
    }
    public function destroy($id){
        $delete = Country::find($id);
        if(!$delete){
            return back()->with('message','country details is not available'); 
        }
        try{
            
          $delete->delete();
          return back()->with('message','country removed succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','You can not remove this information due to the relationship'); 

        }

    }
}
