<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = new Post();
        $posts = $posts->paginate(5);
        return view('pages.home.index', compact('posts'));
    }
}
