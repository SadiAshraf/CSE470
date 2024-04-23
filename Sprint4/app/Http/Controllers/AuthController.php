<?php

namespace App\Http\Controllers;


use App\Models\student;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function logout()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('student_id', 'password');
        $user = Student::where('student_id', $credentials['student_id'])->first();

        if ($user) {
            if ($credentials['password'] == $user->password) {
                $student = student::where('student_id', $user->student_id)->first();
                if ($student) {
                    $student->update(['session' => 'active']);
                }
                return redirect()->route('homepage', ['student_id' => $user->student_id, 'name' => $user->name]);
            } else {
                return redirect()->back()->withErrors(['login' => 'Invalid credentials.']);
            }
        } else {
            $admin = Admin::where('admin_id', $credentials['student_id'])->first();

            if ($admin && $credentials['password'] == $admin->pass) {
                return redirect()->route('show-admin', ['admin_id' => $admin->admin_id]);
            } else {
                return redirect()->back()->withErrors(['login' => 'Invalid credentials.']);
            } 
        }
        
    }
}
