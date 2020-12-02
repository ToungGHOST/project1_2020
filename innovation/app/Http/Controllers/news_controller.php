<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\news;

class news_controller extends Controller
{
    //
    public function news(){
        $data_news=array('data_news'=>news::get_news());
        return view('news',$data_news);
    }
    public function add_news(Request $data_news){
        $file = Input::file('file');
        $file->move(public_path().'/',$file->getClientOriginalName());
        $data_news = array('news_id'=>null,
        'news_name'=>$data_news->input('news_name'),
        'news_img'=>$file->getClientOriginalName(),
        'date_time'=>null,
        'admin_id'=>$data_news->input('admin_id'));
        $add = news::add_news($data_news);
        return redirect('news');
    }
    public function news_img($news_id){
        $data_news = array('data_news'=>news::get_news_img($news_id));
        // dd($data_news);
        return view('show_img_news',$data_news);
    }
    public function delete_news(Request $data_news){
        $filename = $data_news->input('filename');
        $news_id = $data_news->input('news_id');
        news::delete_news($news_id,$filename);
        // dd($data_news);
        return redirect('news');
    }
    public function home_news(){
        $data_news=array('data_news'=>news::get_news());
        // dd($data_news);
        return view('home',$data_news);
    }
}