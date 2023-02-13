@extends('template.app')

@section('content')
    <div class="row">
        <div class="col">
            <p class="h1">Exibindo Postagem</p> <span><a href="{{ route('home') }}">voltar...</a></span>
        </div>
    </div>

    <hr>

    <form>
        <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input name="title" type="text" class="form-control text-body-secondary" id="title"
                value="{{ $post->title }}" readonly>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autor</label>
            <input name="author" type="text" class="form-control text-body-secondary" id="author"
                value="{{ $post->author }}" readonly>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo</label>
            <textarea name="content" class="form-control text-body-secondary" id="content" rows="3" readonly>{{ $post->content }}</textarea>
        </div>
    </form>
@endsection
