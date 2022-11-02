<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;

class TestimonialController extends Controller
{
    //
    public function addTestimonial(){
        $users = User::all();
        return view('student.testimonial/add-testimonial',compact('users'));
    }
    public function savetestimonial(request $request){
        $testimonial = new Testimonial;

        $testimonial->student_id=$request->student_id;

        $testimonial->content=$request->content;

        if(!$testimonial){
            return back()->with('message','testimonial details is not available'); 
        }
        try{
            
            $testimonial->save();
          return back()->with('message','testimonial added succesfully, Thank you for feedback'); 


        }catch(\Exception $e){
            return back()->with('message','An error occured'); 

        }
    
    }
    public function manageTestimonial(){
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonial/manage-testimonial',compact('testimonials'));
    }
    public function approve($id){
        $approve = Testimonial::find($id);
        $approve->publish=1;
        $approve->save();
        return redirect()->back()->with('message','Published succesfully');
    }
    public function delete($id){
        $delete = Testimonial::find($id);
        $delete->delete();
        return redirect()->back();
    }
}
