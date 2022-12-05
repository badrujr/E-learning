<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Team;
use App\Models\Student;
use App\Models\Country;
use App\Models\Level;
use App\Models\CourseCategory;
use App\Models\CourseVideo;
use App\Models\AboutUs;
use App\Models\Quiz;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Comment;
use App\Models\Tutor;
use App\Models\Profession;
use App\Models\Bookmark;
use App\Models\Payment;
use DB;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0'){
                $categories = CourseCategory::all();
                $students = Student::all()->count();
                $courses = Course::latest()->get();
                $count = CourseVideo::all()->count();
                $levels = Level::all();
               
                return view('student.home',compact('categories','students','courses','count','levels'));
            }
          
            else{
                $country = Country::all()->count();
                $level = Level::all()->count();
                $user = User::all()->count();
                $student = Student::all()->count();
                $quiz = Quiz::all()->count();
                $categories = CourseCategory::all()->count();
                $count = Course::all()->count();
                $courses = Course::latest()->get();
                $tutor = Tutor::all()->count();
                $profession = Profession::all()->count();
                $comments = Comment::all()->count();
                return view('admin.home',compact('country','level','user','student','quiz','categories','courses','count','tutor','profession','comments'));
            }

        }
        else{
            return redirect()->back();
        }
    }
    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        else{
          $aboutus = AboutUs::latest()->get();
          $teams = Team::all();
          $categories = CourseCategory::inRandomOrder()->limit(6)->get();
          $courses = Course::inRandomOrder()->limit(6)->get();
          $blogs = Blog::inRandomOrder()->limit(6)->get();
          $testimonials = Testimonial::inRandomOrder()->limit(1)->where('publish','=',1)->get();
          return view('home',compact('aboutus','teams','categories','courses','blogs','testimonials'));
        }
       
    }
    public function signin(){
        return view('signin');
    }
    public function signup(){
        return view('signup');
    }

}
