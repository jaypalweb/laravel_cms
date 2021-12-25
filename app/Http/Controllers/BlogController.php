<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    protected $limit = 3;

    public function index(){
        $categories = Category::with(['posts' => function($query){
            $query->published();
        }])->orderBy('title', 'asc')->get();

        $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->paginate($this->limit);
        return view("blog.index", compact('posts', 'categories'));
    }

    public function category($id){
        $categories = Category::with(['posts' => function($query){
            $query->published();
        }])->orderBy('title', 'asc')->get();
        // DB::enableQueryLog();
        $posts = Category::find($id)
                    ->posts()
                    ->with('author')
                    ->latestFirst()
                    ->published()
                    ->paginate($this->limit);

        return view("blog.index", compact('posts', 'categories'));
        // dd(DB::getQueryLog());
    }

    public function show(Post $post)
    {
        return view("blog.show", compact('post'));
    }
}
