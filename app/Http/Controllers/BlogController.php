<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    protected $limit = 3;

    public function index(){
        $posts = Post::with('author')->latestFirst()->paginate($this->limit);
        return view("blog.index", compact('posts'));
    }
}
