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

class ViewHomepageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGotoHome()
{
    // Create a sample student
    $student = student::where('student_id', '21101070')->first();

    // Enroll the student in some courses
    $enrolledCourses = enrolledStudents::where('student_id', '21101070')->get();

    // Call the gotohome method with the student ID
    $response = $this->get(route('homepage', ['student_id' => $student->student_id]));

    // Assert that the response is successful (status code 200)
    $response->assertStatus(200);

    // Assert that the response contains the correct data
    $response->assertViewHas('allcourses', $enrolledCourses);
    $response->assertViewHas('student_id', $student->student_id);
    $response->assertViewHas('name', $student->name);
}


    public function testGotoUserProfile()
    {
        // Create a sample student
        $student = student::where('student_id', '21101070')->first();

        // Enroll the student in some courses
        $enrolledCourses = enrolledStudents::where('student_id', '21101070')->get();

        // Call the gotouserprofile method with the student ID
        $response = $this->get(route('userprofile',['student_id'=> $student->student_id]));

        // Assert that the response is successful (status code 200)
        $response->assertStatus(200);

        // Assert that the response contains the correct data
        $response->assertViewHas('allcourses', $enrolledCourses);
        $response->assertViewHas('student_id', $student->student_id);
        $response->assertViewHas('name', $student->name);
    }

    
}
