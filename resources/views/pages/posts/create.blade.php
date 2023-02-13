@extends('template.app')

@section('content')
    <div class="row">
        <div class="col">
            <p class="h1">Nova Postagem</p> <span><a href="{{ route('home') }}">voltar...</a></span>
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

    <form action="{{ route('posts.store') }}" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}">
        </div>
        @csrf
        <div class="mb-3">
            <label for="author" class="form-label">Autor</label>
            <input name="author" type="text" class="form-control" id="author" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo</label>
            <textarea name="content" class="form-control" id="content" rows="3">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
