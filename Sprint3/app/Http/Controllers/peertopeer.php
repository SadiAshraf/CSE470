<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\for_dm;

class peertopeer extends Controller
{
    public function senddm(request $request,$sender_id,$reciver_id){
        $chats = for_dm::where(function ($query) use ($sender_id, $reciver_id) {
            $query->where('sender_id', $sender_id)
                  ->where('reciver_id', $reciver_id);
        })->orWhere(function ($query) use ($sender_id, $reciver_id) {
            $query->where('sender_id', $reciver_id)
                  ->where('reciver_id', $sender_id);
        })->get();

        return view('inbox', ['sent'=>$chats,'sender_id'=>$sender_id,'reciver_id'=>$reciver_id]);
    }

    public function insertmsg(request $request,$sender_id,$reciver_id){
        $msg=$request->only('message');
        $user = for_dm::create([
            'sender_id' => $sender_id,
            'reciver_id' => $reciver_id,
            'msg' => $msg['message'],
        ]);
        
        return redirect()->route('inbox',['sender_id'=>$sender_id,'reciver_id'=>$reciver_id]);
        
    }
}
