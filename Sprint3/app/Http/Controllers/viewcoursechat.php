<?php

namespace App\Http\Controllers;

use App\Models\viewchat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class viewcoursechat extends Controller
{
    public function showchat(Request $request)
    {
        $course_id=$request->only('course_id');
        $student_id=$request->only('student_id');

        
        $chats = viewchat::where('course_id', $course_id['course_id'])->get();
        
        return view('chatpage', ['chats'=>$chats,'course_id'=>$course_id['course_id'],'student_id'=>$student_id['student_id']]);
    }

 
    public function addmsg(Request $request, $course_id, $student_id)
    {
        
        $msg=$request->only('message');
        
        viewchat::create([
            'course_id' => $course_id,
            'student_id' => $student_id,
            'type' => 'msg',
            'msg' => $msg['message'],
        ]);
        
        $chats = viewchat::where('course_id', $course_id)->get();
        
        
        return redirect()->route('coursechat',['chats' => $chats, 'course_id' => $course_id, 'student_id' => $student_id]);
    }

    public function grpreq(Request $request, $course_id, $student_id)
    {
        
        $msg=$request->only('request');
        
        viewchat::create([
            'course_id' => $course_id,
            'student_id' => $student_id,
            'type' => 'req',
            'msg' => $msg['request'],
        ]);
        
        $chats = viewchat::where('course_id', $course_id)->get();
    
        return redirect()->route('coursechat',['chats' => $chats, 'course_id' => $course_id, 'student_id' => $student_id]);
    }
}
