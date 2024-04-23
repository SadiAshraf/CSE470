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

class PeerToPeerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testSendDm()
    {
        // Create some sample direct messages between sender and receiver
        $senderId = '21101070'; // Replace 'your_sender_id' with the actual sender ID
        $receiverId = '21101073'; // Replace 'your_receiver_id' with the actual receiver ID
        $dm1 = for_dm::create([
            'sender_id' => $senderId, 
            'reciver_id' => $receiverId,
            'msg'=>'test msg'
        ]);

        // Call the senddm method with specific sender and receiver IDs
        $response = $this->get(route('inbox', ['sender_id'=>$senderId ,'reciver_id' => $receiverId]));

        // Assert that the response is successful (status code 200)
        $response->assertStatus(200);

        // Assert that the response contains the correct direct messages
       
    }

    public function testInsertMsg()
    {
        // Prepare request data
        $senderId = '21101070'; // Replace 'your_sender_id' with the actual sender ID
        $receiverId = '21101073'; // Replace 'your_receiver_id' with the actual receiver ID
        $dm1 = for_dm::create([
            'sender_id' => $senderId, 
            'reciver_id' => $receiverId,
            'msg'=>'test msg'
        ]);

        // Call the insertmsg method with the request data
        $response = $this->post(route('send-dm-msg', [
            'sender_id'=>$senderId ,
            'reciver_id' =>$receiverId,
            'message'=> $dm1->msg
        ]));

        

        // Assert that the message is inserted into the database
        $this->assertDatabaseHas('dm_table', [
            'sender_id' => $senderId,
            'reciver_id' => $receiverId,
            'msg' => $dm1->msg,
        ]);
    }
}

