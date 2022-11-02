<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\course;
use App\Models\team;
use App\Models\student;
use App\Models\Messages;

class Message extends Controller
{
    public function upload_message_function(Request $request){
        $msg = new Messages;
    
        $msg->name=$request->name;
    
        $msg->email=$request->email;
       
        $msg->phone=$request->phone;
        $msg->message=$request->message;
    
        $msg->save();
        return redirect()->back()->with('message','We receive your message succesfully');
    }
}
