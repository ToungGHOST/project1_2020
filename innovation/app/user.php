<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class user extends Model
{
	public static function register($data_register){
        return DB::table('user')->insert($data_register);
    }
    public static function add_admin($data_admin){
        return DB::table('admin')->insert($data_admin);
    }
    public static function login($username){
        $user = DB::table('user')->where('username', '=', $username)->first();
        session(['user' => 'user']);
        if($user==null){
            $user = DB::table('admin')->where('username', '=', $username)->first();
            session(['user' => 'admin']);
        }
        return $user;
    }
}
