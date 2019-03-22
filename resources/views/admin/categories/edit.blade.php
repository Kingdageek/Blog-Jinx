@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Update category - {{ $category->name }}</h2>
        </div>

        <div class="panel-body">

            @include('admin.includes.errors')
            <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Store category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
