<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class WelcomeController extends Controller
{
    public function index(Post $post){
        // return view('welcome')->with('posts', $post);
        return view('welcome')->with('posts', Post::latest()->paginate(4));
    }
    
}
