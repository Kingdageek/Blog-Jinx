@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Create a new tag</h2>
        </div>

        <div class="panel-body">

            @include('admin.includes.errors')
            <form action="{{ route('tags.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" name="tag" class="form-control" value="{{ old('tag') }}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Store tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
