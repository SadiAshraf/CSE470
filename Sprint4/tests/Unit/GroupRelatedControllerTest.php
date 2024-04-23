<?php

use App\Models\create_group;
use Tests\TestCase;
use App\Models\group_msg;

use App\Models\create_members;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroupRelatedControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShowGroupChat()
    {
        // Create some sample group messages
        $groupMsg1 = create_group::create([
            'group_name'=> 'Test_group',
            'belongs_to'=> 'CSE110'
        ]);
        $member1= create_members::create([
            'group_name'=> 'Test_group',
            'student_id'=>'21101070'
        ]);
        $member2= create_members::create([
            'group_name'=> 'Test_group',
            'student_id'=>'21101073'
        ]);

        
        $response = $this->get('/grp_chat', ['name' => 'Test_group', 'student_id'=> '21101070']);

        $response->assertViewIs('grp_chat');
    }
    public function testSendingMsg(){
        $group1 = create_group::create([
            'group_name'=> 'Test_group',
            'belongs_to'=> 'CSE110'
        ]);
        $member1= create_members::create([
            'group_name'=> 'Test_group',
            'student_id'=>'21101070'
        ]);
        $member2= create_members::create([
            'group_name'=> 'Test_group',
            'student_id'=>'21101073'
        ]);
        // $msg=group_msg::create(
        //     ['group_name'=>'Test_group',
        //     'sent_by'=> '21101070',
        //     'msg'=> 'test msg'
        // ]);

        $response = $this->post('/grp_chat', [
            'student_id' => '21101070',
            'name' => 'Test_group',
            'message' => 'test msg' 
        ]);

        $this->assertDatabaseHas('group_msg', [
            'group_name'=> 'Test_group',
            'sent_by'=> '21101070',
            'msg'=> 'test msg'
        ]);
    }
}
