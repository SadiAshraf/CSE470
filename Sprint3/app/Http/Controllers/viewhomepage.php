<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use App\Models\enrolledstudents;

class viewhomepage extends Controller
{
    public function gotohome(Request $request){
        $student_id = $request->student_id;

        $user = student::where('student_id', $student_id)->first();

        $allcourses = enrolledstudents::where('student_id', $student_id)->get();

        
        return view('homepage',['allcourses'=> $allcourses,'student_id'=>$user['student_id'],'name'=>$user['name']]);
    }

    public function gotouserprofile(Request $request){
        $student_id = $request->student_id;

        $user = student::where('student_id', $student_id)->first();

        $allcourses = enrolledstudents::where('student_id', $student_id)->get();

        
        return view('userprof',['allcourses'=> $allcourses,'student_id'=>$user['student_id'],'name'=>$user['name']]);
    }

    public function admin(Request $request){
        $admin_id = $request->only('admin_id');
        return view('admin-page',['admin_id'=>$admin_id]);
    }
}
