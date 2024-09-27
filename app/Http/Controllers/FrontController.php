<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        // if (request('user')) {
        //     $user = User::firstWhere('name', request('user'));
        //     $title = ' by ' . $user->name;
        // }

        return view('front.index', [
            "title" => "Teknik Rekayasa",
            "meta_desc" => "Teknik Informatika, UNSIKA, Mahasiswa Informatika, SMKN 1 KAWALI ,Programming, Emil Maulana ,Kursus Laravel, Kursus PHP, Kursus VueJS, Kursus Git, Kursus Pemrograman, Kursus Koding, Kursus Membuat Web, Kursus Web Development, Training Laravel, Training PHP, Training VueJS, Training Git, Kursus Koding Karawang, Kursus Koding Cikarang, Kursus Koding Bekasi, Kursus Laravel Karawang, Kursus Laravel Cikarang, Kursus Laravel Bekasi, Kursus VueJS Karawang, Kursus VueJS Surabaya, Kursus VueJS Bekasi, Kursus Programming Karawang, Kursus Programming Surabaya, Kursus Android Karawang, Kursus Android Surabaya, Kursus Web Karawang, Kursus Web Surabaya, Kursus Web Bekasi, Kursus PHP Karawang, Kursus PHP Surabaya, Kursus PHP Bekasi, Kursus Website Karawang, Kursus Website Surabaya, Kursus Website Bekasi, Kursus Laravel Murah, Kursus PHP Murah, Kursus VueJS Murah",
            "active" => "home",
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(5)->withQueryString(),
            "categories" => Category::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
