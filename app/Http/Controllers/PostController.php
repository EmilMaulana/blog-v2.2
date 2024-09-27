<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {

        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' di ' . $category->name;
        }

        if (request('user')) {
            $user = User::firstWhere('name', request('user'));
            $title = ' oleh ' . $user->name;
        }

        // Ambil postingan terbaru
        $latestPost = Post::latest()->first();

        return view('blogs', [
            "title" => "Semua Artikel" . $title,
            "meta_desc" => $latestPost ? $latestPost->excerpt : "Deskripsi default jika tidak ada post",
            "active" => "artikel",
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        $post->increment('views');
        
        return view('front.post', [
            "title" => $post->title,
            "meta_desc" => $post->excerpt,
            "active" => "artikel",
            "post" => $post,
            "terbaru" => Post::latest()->paginate(5),


        ]);
    }

    public function categories()
    {
        // Ambil postingan terbaru
        $latestPost = Post::latest()->first();

        return view('front.categories', [
            "title" => "Post Categories",
            "meta_desc" => $latestPost ? $latestPost->excerpt : "Deskripsi default jika tidak ada post",
            "active" => "categories",
            "categories" => Category::all()
        ]);
    }
}
