<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\user;

class user_controller extends Controller
{
    //
    public function register(Request $data_register){
        $this->validate($data_register, [
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:8',
            'con_password' => 'required|string|min:8',
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'phone' => 'required|digits:10',
            'email' => 'required|email|max:150',
        ]);
        if($data_register->input('password')==$data_register->input('con_password')){
            $user = user::login($data_register->input('username'));
            session()->flush(); //ลบเซสชั่นจากการยืมใช้ฟังชั่นล็อคอินเพื่อเช็คusername
            if($user==null){
                $data_register = array('user_id'=>null,
                'username'=>$data_register->input('username'),
                'password'=>Hash::make($data_register->input('password')),
                'first_name'=>$data_register->input('first_name'),
                'last_name'=>$data_register->input('last_name'),
                'phone'=>$data_register->input('phone'),
                'email'=>$data_register->input('email'));
                $add = user::register($data_register);
                if($add>0){
                    return back()->with('status', trans("1")); //สำเร็จ
                }else{
                    return back()->with('status', trans("2")); //เกิดข้อผิดพลาด
                }
            }else{
                return back()->with('status', trans("4"));//มีชื่อผู้ใช้นี้อยู่แล้ว
            }
        }else{
            return back()->with('status', trans("3"));//รหัสผ่านไม่ตรงกัน
        }
    }
    public function login(Request $data_login){
        $this->validate($data_login, [
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:8',
        ]);
        $username = $data_login->input('username');
        $password = $data_login->input('password');
        $user = user::login($username);
        if($user!=null){
            if (Hash::check($password, $user->password)) {
                if(session('user') == "admin"){
                    session(['user_name' => $user->admin_first_name]);
                    session(['user_id' => $user->admin_id]);
                }elseif(session('user') == "user"){
                    session(['user_name' => $user->first_name]);
                    session(['user_id' => $user->user_id]);
                }
                // return redirect('home');
                return back();
            }else{
                session()->forget('user');
                return back()->with('status', trans("5"));//รหัสผ่านไม่ถูกต้อง
            }
        }
        else{
            session()->forget('user');
            return back()->with('status', trans("6"));//ไม่มีชื่อผู้ใช้นี้
        }
    }
    public function logout(){
        session()->flush();
        return redirect('home');
    }
    public function add_admin(Request $data_admin){
        if($data_admin->input('password')==$data_admin->input('con_password')){
            $user = user::login($data_admin->input('username'));
            session()->flush(); //ลบเซสชั่นจากการยืมใช้ฟังชั่นล็อคอินเพื่อเช็คusername
            if($user==null){
                $data_admin = array('admin_id'=>null,
                'username'=>$data_admin->input('username'),
                'password'=>Hash::make($data_admin->input('password')),
                'first_name'=>$data_admin->input('first_name'),
                'last_name'=>$data_admin->input('last_name'));
                $add = user::add_admin($data_admin);
                if($add>0){
                    return back()->with('status', trans("1")); //สำเร็จ
                }else{
                    return back()->with('status', trans("2")); //เกิดข้อผิดพลาด
                }
            }else{
                return back()->with('status', trans("4"));//มีชื่อผู้ใช้นี้อยู่แล้ว
            }
        }else{
            return back()->with('status', trans("3"));//รหัสผ่านไม่ตรงกัน
        }
    }
}
