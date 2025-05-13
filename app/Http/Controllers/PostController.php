<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('category')->get();
        $categories = Category::all();
        return view('backend.post.index', compact('posts', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $imageFileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('post', $imageFileName, 'public');
            $request->image = $imageFileName;
        }

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('posts.index');
        }

        //Bisa pakai cara yang ini juga
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'category_id' => 'required|exists:categories,id'
        ]);

        $post = Post::findOrFail($request->id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $imageFileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('post', $imageFileName, 'public');
            $post->image = $imageFileName;
        }
        $post->save();

        return redirect()->route('posts.index');
    }


        //Bisa pakai cara di bawah :
//    public function update(Request $request)
//    {
//
//        $post = Post::findOrFail($request->id);
//
//        $this->validate($request, [
//            'title' => 'sometimes|required',
//            'description' => 'sometimes|nullable',
//            'image' => 'sometimes|image|mimes:jpeg,png,jpg',
//            'category_id' => 'sometimes|exists:categories,id'
//        ]);
//
//        if ($request->has('title')) {
//            $post->title = $request->title;
//        }
//
//        if ($request->has('description')) {
//            $post->description = $request->description;
//        }
//
//        if ($request->has('category_id')) {
//            $post->category_id = $request->category_id;
//        }
//
//        if ($request->hasFile('image')) {
//            $imageFileName = time() . '_' . $request->file('image')->getClientOriginalName();
//            $request->file('image')->storeAs('post', $imageFileName, 'public');
//            $post->image = $imageFileName;
//        }
//
//        $post->save();
//        return redirect()->route('posts.index');
//    }

    public function delete($id){

        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
