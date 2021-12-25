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
        
        $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->paginate($this->limit);
        return view("blog.index", compact('posts'));
    }

    public function category(Category $category){
        $categoryName = $category->title;

        
        // DB::enableQueryLog();
        $posts = $category->posts()
                    ->with('author')
                    ->latestFirst()
                    ->published()
                    ->paginate($this->limit);

        return view("blog.index", compact('posts', 'categoryName'));
        // dd(DB::getQueryLog());
    }

    public function show(Post $post)
    {
        return view("blog.show", compact('post'));
    }
}
