<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class AppController extends Controller
{

    public function welcome(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $categories = Category::all();
        $searchQuery = $request->input('query');
        if ($searchQuery) {
            $posts = Post::with(['user','category'])->where('title', 'like', '%' . $searchQuery . '%')->orWhere('body', 'like', '%' . $searchQuery . '%')->paginate(30);
        } else {
            $posts = Post::with(['user','category'])->paginate(15);
        }
        return view('welcome', compact('posts', 'categories'));
    }

    public function category(Category $category): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $posts = $category->posts()->with(['user','category'])->latest()->paginate(15);
        $categories = Category::latest()->get();
        return view('welcome', compact('posts', 'categories', 'category'));
    }

    public function articleDetails(Post $post)
    {
        $post->increment('views');
        $categories = Category::all();
        return view('article-details', compact('post', 'categories'));
    }

}
