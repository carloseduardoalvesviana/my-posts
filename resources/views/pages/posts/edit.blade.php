@extends('template.app')

@section('content')
    <div class="row">
        <div class="col">
            <p class="h1">Editando Postagem</p> <span><a href="{{ route('home') }}">voltar...</a></span>
        </div>
    </div>

    <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autor</label>
            <input name="author" type="text" class="form-control" id="author" value="{{ $post->author }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo</label>
            <textarea name="content" class="form-control" id="content" rows="3">{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
