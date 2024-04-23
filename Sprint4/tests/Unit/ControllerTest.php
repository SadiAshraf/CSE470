<?php
namespace Tests\Unit;

use App\Models\admin;
use Tests\TestCase;
use App\Models\student;
use App\Models\course_content;
use App\Models\create_group;
use App\Models\create_members;
use App\Models\enrolledstudents;
use App\Models\for_dm;
use App\Models\group_msg;
use App\Models\offeredcourse;
use App\Models\viewchat;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testValidStudentLogin()
    {
        $student = student::create([
            'student_id'=> '21101075',
            'name'=> 'Fariya anjum',
            'password'=> 'ffff'
        ]);

        $response = $this->post('/login', [
            'student_id' => $student->student_id,
            'password' => 'ffff', // Assuming 'password123' is the default password
        ]);

        $response->assertRedirect(route('homepage', ['student_id' => $student->student_id,'name' => $student->name]));
        // Add more assertions if needed
    }

    public function testInvalidStudentLogin()
    {
        $response = $this->post('/login', [
            'student_id' => '21101077',
            'password' => 'oooo',
        ]);

        $response->assertRedirect('/');
        

  
    }

    public function testAdminLogin()
{
    $admin = admin::create([
        'admin_id' => 'a-5555',
        'pass' => '5555', // Assuming you're hashing passwords
    ]);

    $response = $this->post('/login', [
        'student_id' => 'a-5555',
        'password' => '5555', // Assuming '5555' is the default password
    ]);

    $response->assertRedirect(route('show-admin' ,['admin_id'=>$admin->admin_id] ));
    // Adjust the URL if your actual redirect URL is different

    // Add more assertions if needed
}

}










