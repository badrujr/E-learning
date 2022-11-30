<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Gender;
use App\Models\Country;
use App\Models\Tutor;
use App\Models\TutorProfile;
use App\Models\CourseCategory;
use App\Models\CourseVideo;
use App\Models\Quiz;
use App\Models\Bookmark;
use DB;
use PDF;
use Session;


class studentController extends Controller
{
    public function fillAdmissionForm(){
        $genders = Gender::all();
        $countries = Country::all();
        $users = User::all();
        $checks = Student::where('user_id','=',Auth::user()->id)->get();
        return view('student.admission/fill-admission-form',compact('genders','countries','checks'));
    }
    public function saveStudent(request $request){

        $student = new Student;

        $image = $request->file;
    
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('studentimage',$imagename);
        $student->image=$imagename;
    
        $student->name=$request->name;
    
        $student->gender_id=$request->gender_id;
       
        $student->dob=$request->dob;

        $student->country_id=$request->country_id;

        $student->user_id=$request->user_id;

        if(!$student){
            return back()->with('message','Team details is not available'); 
        }
        try{
            
            $student->save();
          return back()->with('message','Thank you for your information! Data has been recorded succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
 
    public function showcourses(){
        $courses = Course::latest()->get();
        return view('student.course/showcourse',compact('courses'));
    }
    public function playlist(){
        return view('student.view_playlist');
    }
    public function viewPlaylist($id){
        $course = Course::find($id);
        return view('student.video/playlist',compact('course'));
    }
    public function watchVideo($id){
        $courseVideo = CourseVideo::find($id);
        return view('student.video/watch-video',compact('courseVideo'));
    }
    public function profile(){
        return view('student.profile');
    }
    public function tutor(){
        $tutors = Tutor::latest()->get();
        $count = CourseVideo::all()->count();
        $courses = Course::latest()->get();
        return view('student.tutor/tutors',compact('tutors','courses'));
    }
    public function viewProfile($id){
        $tutor = Tutor::find($id);
        return view('student.tutor/profile',compact('tutor'));
    }
    public function attemptQuiz($id){
        $course = CourseVideo::find($id);
        return view('student.quiz/attempt-quiz',compact('course'));
    }

    public function index(){
        $students = Student::latest()->get();
        return view('admin.students/index',compact('students'));
    }
    public function edit($id){
        $student = Student::find($id);
        if(!$student){
            Session::flash('error','Student not found');
            return back();

        }
        return view('admin.students/edit',compact('student'));
    }
    public function studentProfile($id){
        $studentProfile = Student::find($id);
        $countBookmark = Bookmark::where('student_id','=',$studentProfile)->count();
        return view('admin.students/view-student',compact('studentProfile','countBookmark'));
    }
    public function searchStudent(Request $request){
        $search_student = $request->search_student;
        $students = Student::where('name','LIKE',"%{$search_student}%")->get(); 
        return view('admin.students/manage-student',compact('students'));
    }
    public function destroy($id){
        $delete = Student::find($id);
        if(!$delete){
            return back()->with('message','student details is not available'); 
        }
        try{
            
          $delete->delete();
          return back()->with('message','student removed succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','You can not Delete a student information in the system'); 

        }

    }

    public function trash(){
        $students = Student::onlyTrashed()->get();
        return view('admin.student/trash-student-list',compact('students'));
    }

    public function restore($id){
        $student = Student::where('id','=', $id)->restore();
        return back()->with('message','student details have been restored successfuly'); 
    }

    public function deleteStudentPermanent($id){
        $student = Student::where('id', $id);
        $deletePermanent->forceDelete();
        return back()->with('message','student details have been permanent removed successfuly'); 
    }

    public function viewPdf(){
        $students = Student::all();
        $pdf = PDF::loadView('admin.pdf/studentdetails', array('students' => $students));
        return $pdf->stream();
    }
 
}
