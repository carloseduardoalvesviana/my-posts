<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('pages.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'author' => 'required',
            'content' => 'required',
        ]);

        $newPost = new Post($request->only(['title', 'author', 'content']));
        $newPost->save();

        return redirect()->route('home')->with('message', 'Postagem criada com sucesso.');
    }

    public function edit($id)
    {
        $post = new Post();
        $post = $post->find($id);
        return view('pages.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'content' => 'required',
        ]);
        $post = new Post();
        $post = $post->find($id);
        $post = $post->update($request->all());
        return redirect()->route('home')->with('message', 'Postagem atualizada com sucesso.');
    }

    public function show($id)
    {
        $post = new Post();
        $post = $post->find($id);
        return view('pages.posts.show', compact('post'));
    }

    public function destroy($id)
    {
        $post = new Post();
        $post = $post->find($id);
        $post->delete();
        return redirect()->route('home')->with('message', 'Postagem deletada sucesso.');
    }
}
