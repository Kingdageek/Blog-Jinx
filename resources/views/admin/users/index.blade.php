@extends('layouts.app')
@section('content')
    <div>
        <a href="{{ route('users.create') }}" class="btn btn-success pull-right">Create new user</a>
    </div>
    <div class="panel-heading">
        <h2>Users</h2>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">

            @if ( ! $users->isEmpty() )
                <table class="table table-hover">
                    <thead>
                        <th>
                            Avatar
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Permissions
                        </th>
                        <th>
                            Actions
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ asset( $user->profile->avatar ) }}" alt="{{ $user->name }}" width="60px" height="60px" style="border-radius: 50%">
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    <form action="{{ route('users.admin', ['user' => $user->id]) }}" method="post" onclick="confirm('Sure to change this user\'s permissions?') ? '' : event.preventDefault()">
                                    @csrf
                                    @if ($user->is_admin)
                                        <input type="submit" value="Remove permissions" class="btn btn-xs btn-danger">
                                    @else
                                        <input type="submit" value="Make admin" class="btn btn-xs btn-primary">
                                    @endif
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-xs btn-info">
                                        Edit
                                    </a>

                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="user" onclick="confirm('Sure to send this user to trash?') ? '' : event.preventDefault()" style="display:inline-block">
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
                <p class="text-center"><strong>No users here. Create a new user above.</strong></p>
            @endif
        </div>
    </div>

@endsection
