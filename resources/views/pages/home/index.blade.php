@extends('template.app')

@section('content')
    <div class="row d-flex align-items-center">
        <div class="col">
            <p class="h1">Minhas Postagens</p>
        </div>

        <div class="col text-end">
            <a role="button" href="{{ route('posts.create') }}" type="button" class="btn btn-success">Nova Postagem</a>
        </div>
    </div>

    <hr>

    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p>
                {{ $message ?? '' }}
            </p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="mt-2 table">
            <thead class="bg-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Data criação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td class="d-flex justify-content-start">
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Opções
                                </button>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" type="submit"
                                            href="{{ route('posts.show', $post->id) }}">Detalhes</a>
                                    </li>
                                    <li><a class="dropdown-item btn" type="submit"
                                            href="{{ route('posts.edit', $post->id) }}">Atualizar</a>
                                    </li>
                                    <li>
                                        {{-- <a role="button" class="dropdown-item"
                                            onclick="document.getElementById('deletePost').submit();">Deletar</a> --}}

                                        <a role="button" class="dropdown-item" onclick="deletarPost()">Deletar</a>
                                        <form style="display: none" id="deletePost"
                                            action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>

                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deletarPost() {
        Swal.fire({
            title: 'Tem certeza?',
            text: "O dado será excluido da listagem, porém ainda estará salvo no banco!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Deletar Postagem!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deletePost').submit();
            }
        })
    }
</script>
