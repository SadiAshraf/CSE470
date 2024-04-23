<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\admin;
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
class ViewCourseChatControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShowChat()
    {
        // Create some sample chat messages for a specific course ID
        $courseId = 'CSE110'; // Replace 'your_course_id' with the actual course ID

        $chats = viewChat::create([
            'course_id'=> 'CSE110',
            'student_id'=> '21101070',
            'type'=> 'msg',
            'msg'=> 'test msg'
        ]);

        // Call the showchat method with the course ID
        $response = $this->get("/course_chat?course_id=CSE110&student_id=21101070");


        // Assert that the response is successful (status code 200)
        $response->assertStatus(200);

        // Assert that the response contains the correct chat messages
        $response->assertViewIs('chatpage');
    }

    public function testAddMsg()
    {
        // Prepare request data
        $courseId = 'CSE110'; // Replace 'your_course_id' with the actual course ID
        $studentId = '21101070'; // Replace 'your_student_id' with the actual student ID
        $message = 'Test message';

        // Call the addmsg method with the request data
        $response = $this->post("/{$courseId}/{$studentId}", ['message' => $message]);

        // Assert that the response redirects to the course chat route
        $response->assertRedirect(route('coursechat', ['course_id' => $courseId, 'student_id' => $studentId]));

        // Assert that the message is inserted into the database
        $this->assertDatabaseHas('course_discussion', [
            'course_id' => $courseId,
            'student_id' => $studentId,
            'type' => 'msg',
            'msg' => $message,
        ]);
    }
    public function testGrpReq()
        {
            // Prepare request data
            $courseId = 'CSE110'; // Replace 'your_course_id' with the actual course ID
            $studentId = '21101070'; // Replace 'your_student_id' with the actual student ID
            $requestMessage = 'Group request message';
    
            // Call the grpreq method with the request data
            $response = $this->post("/{$courseId}/{$studentId}/req", ['request' => $requestMessage]);
    
            // Assert that the response redirects to the course chat route
            $response->assertRedirect(route('coursechat', ['course_id' => $courseId, 'student_id' => $studentId]));
    
            // Assert that the group request message is inserted into the database
            $this->assertDatabaseHas('course_discussion', [
                'course_id' => $courseId,
                'student_id' => $studentId,
                'type' => 'req',
                'msg' => $requestMessage,
            ]);
        }
}