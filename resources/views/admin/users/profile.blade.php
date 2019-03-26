@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Edit
                @if ($user->id === auth()->id())
                    your profile
                @else
                    user profile: {{ $user->name }}
                @endif
            </h2>
        </div>

        <div class="panel-body">

            @include('admin.includes.errors')
            <form action="{{ route('users.profile.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="password">New password</label>
                    <input type="text" name="password" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="avatar">Change avatar</label>
                    <input type="file" name="avatar" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="about">About you</label>
                    <textarea name="about" id="about" cols="6" rows="6" class="form-control">{{ $user->profile->about }}</textarea>
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook profile link</label>
                    <input type="url" name="facebook" class="form-control" value="{{ $user->profile->facebook }}">
                </div>

                <div class="form-group">
                    <label for="youtube">YouTube profile link</label>
                    <input type="url" name="youtube" class="form-control" value="{{ $user->profile->youtube }}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
