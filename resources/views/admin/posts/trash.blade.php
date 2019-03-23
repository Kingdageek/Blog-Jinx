@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Trashed Posts</h2>
        </div>
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
                                <form action="{{ route('posts.restore', ['post' => $post->id]) }}" method="post" onclick="confirm('Sure to restore this post?') ? '' : event.preventDefault()" style="display:inline-block">
                                    @csrf
                                    <input type="submit" value="Restore" class="btn btn-success btn-xs">
                                </form>

                                <form action="{{ route('posts.delete', ['post' => $post->id]) }}" method="post" onclick="confirm('Sure to permanently delete this post?') ? '' : event.preventDefault()" style="display:inline-block">
                                    @csrf
                                    <input type="submit" value="Destroy" class="btn btn-danger btn-xs">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center"><strong>No Trashed Posts here.</strong></p>
        @endif
        </div>
    </div>

@endsection
