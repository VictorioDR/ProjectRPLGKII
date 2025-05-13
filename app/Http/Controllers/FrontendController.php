<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $posts = Post::with('category')->latest()->take(6)->get();
        $categories = Category::all();
        return view('frontend.home', compact('posts', 'categories'));
    }

    public function about(){
        $posts = Post::with('category')->latest()->take(6)->get();
        return view('frontend.about');
    }
}
