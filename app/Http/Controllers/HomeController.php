<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = new Post();
        $posts = $posts->all();
        return view('pages.home.index', compact('posts'));
    }
}
