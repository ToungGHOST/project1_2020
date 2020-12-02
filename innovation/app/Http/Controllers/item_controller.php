<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\item;

class item_controller extends Controller
{
    //
    public function add_item_db(Request $data_item){
        $this->validate($data_item, [
            'name' => 'required|string|max:150',
            'serial_number' => 'required|string|max:100',
            'video' => 'required|string|min:1',
            'detail' => 'required|string|min:1',
            'image' => 'required',
        ]);
        $file = Input::file('image');
        $file->move(public_path().'/',$file->getClientOriginalName());
        $data_item = array('item_id'=>null,
        'name'=>$data_item->input('name'),
        'serial_number'=>$data_item->input('serial_number'),
        'detail'=>$data_item->input('detail'),
        'image'=>$file->getClientOriginalName(),
        'video'=>$data_item->input('video'),
        'admin_id'=>$data_item->input('admin_id'));
        $add = item::add_item_db($data_item);
        if($add>0){
            return back()->with('status', trans("1")); //สำเร็จ
        }else{
            return back()->with('status', trans("2")); //เกิดข้อผิดพลาด
        }
    }
    public function update_item_db(Request $data_item){
        $this->validate($data_item, [
            'name' => 'required|string|max:150',
            'serial_number' => 'required|string|max:100',
            'video' => 'required|string|min:1',
            'detail' => 'required|string|min:1',
        ]);
        $file = Input::file('image');
        if ($file!=null) {
            $file->move(public_path().'/',$file->getClientOriginalName());
            $file=$file->getClientOriginalName();
        }else{
            $file=$data_item->input('image_old');
        }
        $item_id = $data_item->input('item_id');
        $data_item = array(
        'name'=>$data_item->input('name'),
        'serial_number'=>$data_item->input('serial_number'),
        'image'=>$file,
        'video'=>$data_item->input('video'),
        'detail'=>$data_item->input('detail'));
        $add = item::update_item_db($data_item,$item_id);
        if($add>0){
            return back()->with('status', trans("1")); //สำเร็จ
        }else{
            return back()->with('status', trans("2")); //เกิดข้อผิดพลาด
        }
    }
    public function add_borrow_db(Request $data_borrow){
        if(session('user')=="user"){
            $this->validate($data_borrow, [
                'date_start' => 'required',
                'date_end' => 'required',
            ]);
            $data_borrow = array('borrow_id'=>null,
            'item_id'=>$data_borrow->input('item_id'),
            'user_id'=>$data_borrow->input('user_id'),
            'admin_id'=>0,
            'date_start'=>$data_borrow->input('date_start'),
            'date_end'=>$data_borrow->input('date_end'),
            'status'=>'1');
            $add = item::add_borrow_db($data_borrow);
            
            if($add>0){
                return back()->with('status', trans("1")); //สำเร็จ
            }else{
                return back()->with('status', trans("2")); //เกิดข้อผิดพลาด
            }
        }elseif(session('user')==null){
            return back()->with('status', trans("8")); //กรุณาล็อคอิน
        }
        else{
            return back()->with('status', trans("7")); //เฉพาะนักศึกษา
        }
    }
    public function show_item(){
        $data_item=array('data_item'=>item::get_item("0"));
        return view('item',$data_item);
    }
    public function edit_item($item_id){
        $data_item=array('data_item'=>item::get_item($item_id));
        return view('edit_item',$data_item);
    }
    public function image($item_id){
        $data_item=array('data_item'=>item::get_item($item_id));
        return view('show_img',$data_item);
    }
    public function delete_item($item_id){
        $add = item::delete_item($item_id);
        if($add>0){
            return back()->with('status', trans("1")); //สำเร็จ
        }else{
            return back()->with('status', trans("2")); //เกิดข้อผิดพลาด
        }
    }
    public function service_item(){
        $data_item = array('data_item'=>item::get_item("0"));
        return view('service_item',$data_item);
    }
    public function borrow_item($item_id){
        $data_item=array('data_item'=>item::get_item($item_id),'data_borrow'=>item::get_borrow("0",$item_id));
        return view('borrow_item',$data_item);
    }
    public function borrow_list(){
        $data_borrow1=array('data_borrow1'=>item::get_borrow("1","1"));
        $data_borrow2=array('data_borrow2'=>item::get_borrow("2","2"));
        //dd($data_borrow);
        return view('borrow_list',$data_borrow1,$data_borrow2);
    }
    public function borrow_histry(){
        $data_borrow=array('data_borrow'=>item::get_borrow("2","3"));
        //dd($data_borrow);
        return view('borrow_histry',$data_borrow);
    }
    public function borrow_change_status($borrow_id,$status,$admin_id){
        $add=item::borrow_change_status($borrow_id,$status,$admin_id);
        return redirect('borrow_list');
    }
    public function item_user($user_id){
        // dd($user_id);
        $data_borrow=array('data_borrow'=>item::get_borrow_user($user_id),'user_id'=>$user_id);
        return view('user_list_item',$data_borrow);
    }
    public function cancel_item($borrow_id,$user_id){
        item::cancel_item($borrow_id);
        return redirect('item_user'.$user_id);
    }
}