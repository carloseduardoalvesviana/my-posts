@extends('template.app')

@section('content')
    <div class="row d-flex align-items-center">
        <div class="col">
            <p class="h1">My Posts</p>
        </div>

        <div class="col text-end">
            <a role="button" href="{{ route('posts.create') }}" type="button" class="btn btn-success">New Post</a>
        </div>
    </div>

    <hr>

    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <ul>
                <li>{{ $message ?? '' }}</li>
            </ul>
        </div>
    @endif

    <div>
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Created</th>
                    <th scope="col">Actions...</th>
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
                            <a role="button" type="submit" href="{{ route('posts.show', $post->id) }}"
                                class="btn btn-primary btn-sm m-1">Details</a>
                            <a role="button" type="submit" href="{{ route('posts.edit', $post->id) }}"
                                class="btn btn-info btn-sm m-1 text-white">Update</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="m-1">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
