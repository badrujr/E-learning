<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    //
    public function addTeam(){
        return view('admin.team/add-team');
    }
    public function saveTeam(request $request){

        $team = new Team;

        $image = $request->file;
    
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('teamimage',$imagename);
        $team->image=$imagename;
    
        $team->title=$request->title;
    
        $team->name=$request->name;
       
        $team->instagram_url=$request->instagram_url;

        $team->twitter_url=$request->twitter_url;

        $team->linkedin_url=$request->linkedin_url;

        if(!$team){
            return back()->with('message','Team details is not available'); 
        }
        try{
            
          $team->save();
          return back()->with('message','team added succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
    public function manageTeam(){
        $teams = Team::latest()->get();
        return view('admin.team/manage-team',compact('teams'));
    }
 
    public function editTeam($id){
        $edit_team = Team::find($id);
        return view('admin.team/edit-team',compact('edit_team'));
    }
    public function update(Request $request,$id){
        $editteam = Team::find($id);
        $image=$request->file;
        if($image){
            $imagename=time().'.'.$image->getClientoriginalExtension();
            $request->file->move('teamimage',$imagename);
            $editteam->image=$imagename;
        }
       
        $editteam->title=$request->title;
        $editteam->name=$request->name;
        $editteam->instagram_url=$request->instagram_url;
        $editteam->twitter_url=$request->twitter_url;
        $editteam->linkedin_url=$request->linkedin_url;

        if(!$editteam){
            return back()->with('message','team member details is not available'); 
        }
        try{
            
            $editteam->save();
          return back()->with('message','team member updated succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','An error occured'); 

        }
        return redirect()->back();
    }
    public function delete($id){
        $delete = Team::find($id);
        $delete->delete();
        return redirect()->back()->with('message','team member removed succesfully');

    }
}
