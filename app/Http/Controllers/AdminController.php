<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Student;
use App\Models\User;
use App\Models\Messages;
use App\Models\Feedback;
use App\Models\Activity_logs;
use DB;
use Auth;
use PDF;

class AdminController extends Controller
{
    public function add_course_view(){
        return view ('admin.add_course');
    }
 

    public function showcourse(){
        $allcourse = course::all();
        return view('admin.showcourse',compact('allcourse'));
    }
    public function edit($id){
        $add = course::find($id);
        return view ('admin.edit_course', compact('add'));
    }
    public function delete($id){
        $data = course::find($id);
        $data->delete();
        return redirect()->back()->with('message','team member removed succesfully');
    }
    public function add_team(){
        return view('admin.add_team');
    }
    public function add_team_fun(Request $request){
       
    }
    public function add_faq_view(){
        return view('admin.add_faq_view');
    }
    public function showteam(){
        $team = team::all();
        return view('admin.showteam',compact('team'));
    }
    public function edit_team_fun($id){
        $edit_team = team::find($id);
        return view('admin.edit_team',compact('edit_team'));
    }
    public function editteam_form_fun(Request $request,$id){
        $editteam = team::find($id);
        $image=$request->file;
        if($image){
            $imagename=time().'.'.$image->getClientoriginalExtension();
            $request->file->move('teamimage',$imagename);
            $editteam->image=$imagename;
        }
       
        $editteam->title=$request->title;
        $editteam->name=$request->name;
        $editteam->instagram=$request->instagram;
        $editteam->facebook=$request->facebook;
        $editteam->linkedin=$request->linkedin;
        $editteam->save();
        return redirect()->back();
    }
    public function delete_team($id){
        $delete_team = team::find($id);
        $delete_team->delete();
        return redirect()->back()->with('message','team member removed succesfully');

    }
    public function showadmission(){
        $admission = user::join('students', 'users.id', '=', 'students.uid')
        ->get(['users.phone', 'students.*']);
        return view('admin.showadmission',compact('admission'));
    }
    public function accept($id){
        $data = student::find($id);
        $data->status='Accepted';
        $data->save();
        return redirect()->back();
    }
    public function decline($id){
        $data = student::find($id);
        $data->status='Declined';
        $data->save();
        return redirect()->back();
    }

    public function individual_student_report(Request $request){
        $fromdate = $request->fromdate;
        $todate = $request->todate;
    
        $data = \DB::select("SELECT * FROM students INNER JOIN users ON students.uid = users.id WHERE students.created_at BETWEEN '$fromdate 00:00:00' AND '$todate 23:59:59'");
        return view('admin.individual_student',compact('data'));
       

    }
    public function student_report_func(){
        $data = \DB::select("SELECT * FROM students");
        return view('admin.individual_student',compact('data'));
    }
    public function general_report(){
        $general = user::join('students', 'users.id', '=', 'students.uid')
        ->get(['users.phone', 'students.*']);
        return view('admin.general_report',compact('general'));
    }
    public function message_view_fun(){
        $msg = messages::all();
        return view('admin.message_view',compact('msg'));
    }
    public function feedback_view(){
        $feedbacks = student::join('feedback', 'students.uid', '=', 'feedback.uid')
                    ->get();
        return view('admin.list_feedback_view',compact('feedbacks'));
    }
    public function publish_fun($id){
        $publish = feedback::find($id);
        $publish->status='Published';
        $publish->save();
        return redirect()->back();

    }
    public function decline_fun($id){
        $publish = feedback::find($id);
        $publish->status='Declined';
        $publish->save();
        return redirect()->back();

    }

    public function activityLogs(){
        // $activity = Activity_logs::all();
        $activity = DB::table('activity_logs')
                       ->distinct('name')
                       ->get();
        return view('super.user_activity',compact('activity'));
    }
    public function generatePDF(){
        $date = date('m/d/Y');
        $pdf = PDF::loadView('admin.showteam',$date);
        return $pdf->download('student.pdf');
    }
}
