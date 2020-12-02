<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class room extends Model
{
    public static function add_room_db($data_room){
        return DB::table('room')->insert($data_room);
    }

    public static function get_room(){
            return DB::table('room')->get();
    }

    public static function room_list(){
        return DB::table('room')
        ->join('user','user.user_id','=','room.user_id')->where("status","=","0")->get();

    }
    public static function room_his(){
        return DB::table('room')
        ->join('user','user.user_id','=','room.user_id')
        ->join('admin','admin.admin_id','=','room.admin_id')
        ->where("room.status","!=","0")
        
        ->get();
    }

    public static function room_his_user($user_id){
        return DB::table('room')->where("room.user_id","=",$user_id)
        ->join('user','user.user_id','=','room.user_id')
        ->where("room.status","!=","0")
        ->get();
    }

    public static function room_user(){
        return DB::table('room')
        ->join('user','user.user_id','=','room.user_id')->where("status","=","0")->get();

    }
    public static function get_room_user($user_id){
        return DB::table('room')->where("room.user_id","=",$user_id)
        ->join('user','user.user_id','=','room.user_id')->where("room.status","=","0")
        ->get();
    }

    public static function cancel_room($room_id){
        return DB::table('room')->where("room_id",'=',$room_id)->delete();
    }


    public static function room_change_status($room_id,$status,$admin_id){
        return DB::table('room')->where("room_id",$room_id)->update(array('status' => $status,'admin_id'=>$admin_id));
    }

    


    
    





}