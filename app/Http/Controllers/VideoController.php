<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\CourseVideo;

class VideoController extends Controller
{
    //
    public function addVideo(){
        $courses = Course::all();
        return view('admin.video/add-video',compact('courses'));
    }
    public function saveVideo(request $request){
      $video = new CourseVideo();
      $request->validate([
            'video'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
       ]);

        $file=$request->file('video');

        $file->move('upload',$file->getClientOriginalName());

        $file_name=$file->getClientOriginalName();

        $video->course_id=$request->course_id;

        $video->video_file=$file_name;

        if(!$video){
            return back()->with('message','course video details is not available'); 
        }
        try{
            
          $video->save();
          return back()->with('message','Course video uploaded succesfully'); 

        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
   
    public function manageVideo(){
        $videos = CourseVideo::latest()->get();
        return view('admin.video/manage-video',compact('videos'));
    }
}
