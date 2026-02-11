<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // Get all categories (limit to 4)
        $categories = Category::all()->take(4);
        
        // Get posts - filter by category if provided
        $query = Post::with('category')->latest();
        
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
        
        $posts = $query->get();
        
        // Get selected category for highlighting
        $selectedCategory = $request->category ?? null;
        
        return view('posts.index', compact('posts', 'categories', 'selectedCategory'));
    }

    public function show($id)
    {
        $post = Post::with('category')->findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
