<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Tutor;
use App\Models\Quiz;
use App\Models\CourseCategory;

class CourseController extends Controller
{
    //
    public function addCourse(){
        $categories = CourseCategory::all();
        $tutors = Tutor::all();
        $quizzes = Quiz::all();
        return view('admin.course/add-course',compact('categories','tutors','quizzes'));
    }
    public function saveCourse(request $request){
        $course = new Course;

        $course->course_category_id=$request->course_category_id;

        $course->name=$request->name;

        $course->content=$request->content;

        $course->price=$request->price;

        $course->tutor_id=$request->tutor_id;

        if(!$course){
            return back()->with('message','course details is not available'); 
        }
        try{
            
          $course->save();
          return back()->with('message','course added succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
    public function manageCourse(){
        $courses = Course::latest()->get();
        return view('admin.course/manage-course',compact('courses'));
    }
}
