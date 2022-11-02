<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\CourseVideo;

class CommentController extends Controller
{
    
    public function saveComment(request $request){
        $comment = new Comment;

        $comment->course_video_id=$request->course_video_id;

        $comment->student_id=$request->student_id;

        $comment->tutor_id=$request->tutor_id;

        $comment->comment=$request->comment;
    
        if(!$comment){
            return back()->with('message','comment details is not available'); 
        }
        try{
            
            $comment->save();
            return back()->with('message','comment added succesfully'); 

        }catch(\Exception $e){
            return back()->with('message','You can not comment on this video'); 

        }
    
    }
    public function viewComment(){
        $courseVideo = CourseVideo::latest()->get();
        return view('student.video/watch-video',compact('courseVideo'));
    }
}
