<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use Auth;

class BookmarkController extends Controller
{
    //
    public function saveBookmark(request $request){
        $bookmark = new Bookmark;

        $bookmark->student_id=$request->student_id;

        $bookmark->course_video_id=$request->course_video_id;
    
        if(!$bookmark){
            return back()->with('message','bookmark details is not available'); 
        }
        try{
            
            $bookmark->save();
            return back()->with('message','added succesfully'); 

        }catch(\Exception $e){
            return back()->with('message','You can not like this video'); 

        }
    
    }
    public function viewBookmark(){
        $studentId = Auth::user()->student->id;
        $bookmarks = Bookmark::where('student_id','=',$studentId)->latest()->get();
        return view('student.bookmark/view-video-bookmark',compact('bookmarks'));
    }
}
