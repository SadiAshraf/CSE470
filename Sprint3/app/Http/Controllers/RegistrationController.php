<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->only([
            'student_id'  ,
            'name' ,
            'password',
        ]);

        $user = student::create([
            'student_id' => $validatedData['student_id'],
            'name' => $validatedData['name'],
            'password' => $validatedData['password'],
        ]);

        return redirect()->route('/');
    }
}
