<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File; 
use DB;
class news extends Model
{
    //
    public static function get_news(){
        return DB::table('news')
        ->join('admin','admin.admin_id','=','news.admin_id')
        ->get();
    }
    public static function add_news($data_news){
        return DB::table('news')->insert($data_news);
    }
    public static function get_news_img($news_id){
        return DB::table('news')->where('news_id','=',$news_id)->get()->first();
    }
    public static function delete_news($news_id,$filename){
        File::delete($filename);
        return DB::table('news')->where('news_id','=',$news_id)->delete();
    }
}