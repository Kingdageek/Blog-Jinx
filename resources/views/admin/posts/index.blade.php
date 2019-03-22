@extends('layouts.app')
@section('content')
    <div>
        <a href="{{ route('posts.create') }}" class="btn btn-success pull-right">Create new post</a>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
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
                                <a href="{{ route('posts.edit', ['category' => $post->id]) }}" class="btn btn-xs btn-info">
                                    Edit
                                </a>

                                <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post" onclick="confirm('Sure to delete this post?') ? '' : event.preventDefault()" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-xs">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
