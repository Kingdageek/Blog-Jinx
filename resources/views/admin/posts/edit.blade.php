@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Edit Post - {{ $post->title }}</h2>
        </div>

        <div class="panel-body">

            @include('admin.includes.errors')
            <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                </div>

                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category_id">Select a category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if ($post->category->id === $category->id)
                                selected
                            @endif
                        >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{ $post->content }}</textarea>
                </div>

                <div class="form-group">
                    <label for="tags">Select tags</label>
                    <div class="checkbox">
                        @foreach ($tags as $tag)
                            <label>
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tags"
                                {{-- To make a checkbox auto-selected if its associated with the post, we
                                need to loop through all the post's tags and find the one that matches the current
                                tag id --}}
                                @foreach ($post->tags as $postTag)
                                    @if ($postTag->id === $tag->id)
                                        checked
                                    @endif
                                @endforeach
                                > {{ $tag->tag }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
