<?php

namespace App\Http\Controllers;


use App\Models\offeredCourse;
use Illuminate\Routing\Controller;


class courseController extends Controller
{
    public function getAllCourses()
    {
        $courses = offeredCourse::all();
        
        
    }
}