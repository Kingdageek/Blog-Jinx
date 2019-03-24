@extends('layouts.app')
@section('content')
    <div>
        <a href="{{ route('posts.create') }}" class="btn btn-success pull-right">Create new post</a>
    </div>
    <div class="panel-heading">
        <h2>Published Posts</h2>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">

            @if ( ! $posts->isEmpty() )
                <table class="table table-hover">
                    <thead>
                        <th>
                            Featured Image
                        </th>
                        <th>
                            Post title
                        </th>
                        <th>
                            Actions
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px">
                                </td>
                                <td>
                                    {{ $post->title }}
                                </td>
                                <td>
                                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-xs btn-info">
                                        Edit
                                    </a>

                                    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post" onclick="confirm('Sure to send this post to trash?') ? '' : event.preventDefault()" style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Trash" class="btn btn-danger btn-xs">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center"><strong>No Posts here. Create a new post above or restore one from trash</strong></p>
            @endif
        </div>
    </div>

@endsection
