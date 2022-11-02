<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseVideo;
use App\Models\CourseLike;

class LikeController extends Controller
{
    //
    public function saveLike(request $request){
        $like = new CourseLike;

        $like->course_id=$request->course_id;

        $like->student_id=$request->student_id;

        $like->tutor_id=$request->tutor_id;
    
        if(!$like){
            return back()->with('message','comment details is not available'); 
        }
        try{
            
            $like->save();
            return back()->with('message','succesfully'); 

        }catch(\Exception $e){
            return back()->with('message','You can not like this video'); 

        }
    
    }
    public function viewLike(){
        $courseLike = CourseLike::latest()->get();
        return view('student.video/watch-video',compact('courseVideo'));
    }
}
