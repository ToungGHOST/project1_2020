<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class item extends Model
{
    //
    public static function add_item_db($data_item){
        return DB::table('item')->insert($data_item);
    }
    public static function update_item_db($data_item,$item_id){
        return DB::table('item')->where("item_id",$item_id)->update($data_item);
    }
    public static function delete_item($item_id){
        return DB::table('item')->where("item_id",$item_id)->delete();
    }
    public static function get_item($item_id){
        if($item_id=="0"){
            return DB::table('item')->get();
        }elseif($item_id!="0"){
            return DB::table('item')->where("item_id","=",$item_id)->get()->first();
        }
    }
    public static function get_borrow($key,$item_id){
        if($key=="2"){
            return DB::table('borrow_item')
            ->join('item','item.item_id','=','borrow_item.item_id')
            ->join('user','user.user_id','=','borrow_item.user_id')
            ->join('admin','admin.admin_id','=','borrow_item.admin_id')
            ->where("borrow_item.status","=",$item_id)
            ->orderBy('borrow_item.date_start', 'ASC')
            ->get();
        }elseif($key=="1"){
            return DB::table('borrow_item')
            ->join('item','item.item_id','=','borrow_item.item_id')
            ->join('user','user.user_id','=','borrow_item.user_id')
            ->where("borrow_item.status","=",$item_id)
            ->orderBy('borrow_item.date_start', 'ASC')
            ->get();
        }elseif($key=="0"){
            return DB::table('borrow_item')->where("item_id","=",$item_id)->get();
        }
    }
    public static function add_borrow_db($data_borrow){
        return DB::table('borrow_item')->insert($data_borrow);
    }
    public static function borrow_change_status($borrow_id,$status,$admin_id){
        return DB::table('borrow_item')->where("borrow_id",$borrow_id)->update(array('status' => $status,'admin_id'=>$admin_id));
    }
    public static function get_borrow_user($user_id){
        return DB::table('borrow_item')->where("user_id",$user_id)
        ->join('item','item.item_id','=','borrow_item.item_id')
        ->orderBy('borrow_item.date_start', 'DESC')
        ->orderBy('borrow_item.status', 'ASC')
        ->get();
    }
    public static function cancel_item($borrow_id){
        return DB::table('borrow_item')->where("borrow_id",'=',$borrow_id)->delete();
    }
}