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

        return view('blogs', [
            "title" => "Semua Artikel" . $title,
            "active" => "artikel",
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        // return $post;
        $category = Category::latest()->get();

        return view('front.post', [
            "title" => $post->title,
            "active" => "artikel",
            "post" => $post,
            "terbaru" => Post::latest()->paginate(5),


        ]);
    }
}
