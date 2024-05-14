<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $posts = Post::latest('id')->get();
        return view('users.home',compact('posts'));
    }

    public function homeDetail($post_id){
        $post = Post::where('id',$post_id)->first();
        return view('users.home_detail',compact('post'));
    }

    public function profile(){
        $posts = Post::where('user_id','LIKE',auth()->user()->id)->latest('id')->get();
        return view('users.profile',compact('posts'));
    }
}
