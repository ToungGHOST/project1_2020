<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\room;

class room_controller extends Controller
{
    //
    public function add_room_db(Request $data_room){
        if(session('user')=="user"){
        $this->validate($data_room, [
            'room_name' => 'required|string|max:150',
            'date_startR' => 'required|string|max:100',
            'date_endR' => 'required|string|min:1',
            'room_event' => 'required|string|min:1',
            'user_id' => 'required|int|min:1',
        ]);
        $data_room = array('room_id'=>null,
        'room_name'=>$data_room->input('room_name'),
        'date_startR'=>$data_room->input('date_startR'),
        'date_endR'=>$data_room->input('date_endR'),
        'room_event'=>$data_room->input('room_event'),
        'user_id'=>$data_room->input('user_id'),
        'admin_id'=>$data_room->input('admin_id'),
        'status'=>$data_room->input('status'));
        $add = room::add_room_db($data_room);
            if($add>0){
                return back()->with('status', trans("7")); //สำเร็จ
            }else{
                return back()->with('status', trans("2")); //เกิดข้อผิดพลาด
            }
        }elseif(session('user')==null){
            return back()->with('status', trans("8")); //กรุณาล็อคอิน
        }
        else{
            return back()->with('status', trans("9")); //เฉพาะนักศึกษา
        }
    }

    public function show_room(){
        $data_room=array('data_room' => room::room_list(),'data_room1'=>room::get_room());
        return view('room',$data_room);
    }
    // public function show_room_user(){
    //     $data_room=array('data_room' => room::room_list(),'data_room1'=>room::get_room());
    //     return view('room_user',$data_room);
    // }

    public function show_his(){
        $data_room=array('data_room' => room::room_his());
        return view('room_history',$data_room);
    }
    public function show_his_user($user_id){
        $data_room=array('data_room' => room::room_his_user($user_id));
        return view('room_user_his',$data_room);
    }

    public function room_calenda(){
        $data_room1=array('data_room1'=>room::get_room());
        return view('serviceroom',$data_room1);
    }

    public function room_change_status($room_id,$status,$admin_id){
        $add=room::room_change_status($room_id,$status,$admin_id);
        return redirect('room');
    }
    public function room_user($user_id){
        $data_room=array('data_room'=>room::get_room_user($user_id),'user_id'=>$user_id);
        return view('room_user',$data_room);
    }
    public function cancel_room($room_id,$user_id){
        room::cancel_room($room_id);
        return redirect('room_user'.$user_id);
    }
    








    
}
