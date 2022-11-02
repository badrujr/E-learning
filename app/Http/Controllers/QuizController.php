<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Quiz;
use App\Models\Course;

class QuizController extends Controller
{
    //
     public function addQuiz(){
        $courses = Course::all();
        return view('admin.quiz/add-quiz',compact('courses'));
    }
    public function saveQuiz(request $request){
        $quiz = new Quiz;

        $quiz->course_id=$request->course_id;

        $quiz->question=$request->question;

        $quiz->correct_answer=$request->correct_answer;


        if(!$quiz){
            return back()->with('message','quiz details is not available'); 
        }
        try{
            
          $quiz->save();
          return back()->with('message','Quiz uploaded succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
    public function manageQuiz(){
        $quizzes = Quiz::latest()->get();
        return view('admin.quiz/manage-quiz',compact('quizzes'));
    }
}
