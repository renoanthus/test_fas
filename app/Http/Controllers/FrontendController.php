<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['categories'] = Category::whereHas('posts')->withCount('posts')->get();
        $data['posts'] = Post::with('category')->orderBy('created_at', 'desc')->paginate(10);
        $data['posts_recent'] = Post::orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.index', $data);
    }
    public function detail($slug)
    {
        $data['categories'] = Category::whereHas('posts')->withCount('posts')->get();
        $data['post'] = Post::with('category')->where('slug', $slug)->first();
        $data['posts_recent'] = Post::orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.blog-detail', $data);
    }
    public function category($slug)
    {
        $data['categories'] = Category::whereHas('posts')->withCount('posts')->get();
        $data['posts'] = Post::with('category')->whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->orderBy('created_at', 'desc')->paginate(10);
        $data['posts_recent'] = Post::orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.index', $data);
    }
}
