<?php

namespace App\Http\Controllers;

use App\Models\create_group;
use App\Models\create_members;
use App\Models\group_msg;
use Illuminate\Http\Request;


class group_related extends Controller
{
    public function show_grp_chat(Request $request){
        $grp = $request->input('name'); 
        $student_id = $request->input('student_id'); 
    
    
        $chats = group_msg::where('group_name', $grp)->get();
        
        return view('grp_chat', ['chats' => $chats, 'student_id' => $student_id, 'grp' => $grp]);
    }
    

    public function add_grp_msg(Request $request){
        $id=$request->only('student_id');
        $grp=$request->only('name');
        $msg=$request->input('message');
        
        group_msg::create([
            'group_name' => $grp['name'],
            'sent_by' => $id['student_id'],
            'msg' => $msg,
        ]);
        
        return redirect()->route('show_grp_chat',['student_id'=>$id['student_id'],'name'=>$grp['name']]);


    }

    public function creategroup(Request $request){
        $member1=$request->only('member1');
        $member2=$request->only('member2');
        $course_id=$request->only('course_id');

        
        $member1_grps = create_members::where('student_id', $member1)->get();
        $member2_grps = create_members::where('student_id', $member2)->get();
        
        $groupNames1 = $member1_grps->pluck('group_name')->toArray();
        $groupNames2 = $member2_grps->pluck('group_name')->toArray();

        
        $groups1 = create_group::whereIn('group_name', $groupNames1)
            ->where('belongs_to', $course_id)
            ->get();

        $groups2 = create_group::whereIn('group_name', $groupNames2)
            ->where('belongs_to', $course_id)
            ->get();


        if ($groups1->count() > 0 && $groups2->count() > 0) {

            return view('error_page',['error_msg'=>'Both of you are already in a group in this same course','student_id'=>$member1['member1']]);

        } else if ($groups1->count() > 0 && $groups2->count() === 0) {

            return view('error_page',['error_msg'=>'You are already in a group in this same course','student_id'=>$member1['member1']]);

        } else if ($groups1->count() === 0 && $groups2->count() > 0) {

            $member2_grps = create_members::where('student_id', $member2)->get();

            $groups2 = create_group::whereIn('group_name', $groupNames2)
                ->where('belongs_to', $course_id)
                ->first();

            $groupMemberCount = create_members::where('group_name', $groups2['group_name'])->count();

            if ($groupMemberCount <= 3) {
                create_members::create([
                    'group_name' => $groups2['group_name'],
                    'student_id' => $member1['member1'],
                ]);
                return redirect()->route('show_grp_chat',['name'=>$groups2['group_name'],'student_id'=>$member1['member1']]);
            } else {
                return view('error_page',['error_msg'=>'Member limit exceeded','student_id'=>$member1['member1']]);
            }

        } else {
            return view('grp_form',['member1'=>$member1['member1'],'member2'=>$member2['member2'],'course_id'=>$course_id['course_id'],'success'=>true]);
        }
}
    public function submit_name(Request $request){
        $name=$request->input('group_name');
        $member1 = $request->only('member1');
        $member2 = $request->only('member2');

       
        $course_id=$request->only('course_id');

        $exixts=create_group::where('group_name',$name)->get();
        if($exixts->count()>0){
            return view('grp_form',['member1'=>$member1['member1'],'member2'=>$member2['member2'],'course_id'=>$course_id['course_id'],'success'=>false]);
        }else{
            
            create_group::create([
                'group_name' => $name,
                'belongs_to' => $course_id['course_id'],
            ]);
            create_members::create([
                'group_name' => $name,
                'student_id' => $member1['member1'],
            ]);
            create_members::create([
                'group_name' => $name,
                'student_id' => $member2['member2'],
            ]);
            
            return redirect()->route('show_grp_chat',['name'=>$name,'student_id'=>$member1['member1']]);
        }

}
}