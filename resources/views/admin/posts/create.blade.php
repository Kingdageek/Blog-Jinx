@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Create a new post</h2>
        </div>

        <div class="panel-body">

            @include('admin.includes.errors')
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category_id">Select a category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{ old('content') }}   </textarea>
                </div>

                <div class="form-group">
                    <label for="tags">Select tags</label>
                    <div class="checkbox">
                        @foreach ($tags as $tag)
                            <label>
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tags"> {{ $tag->tag }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Store post</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop
