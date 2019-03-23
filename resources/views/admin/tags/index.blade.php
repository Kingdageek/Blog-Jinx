@extends('layouts.app')
@section('content')
    <div>
        <a href="{{ route('tags.create') }}" class="btn btn-success text-right">Create new tag</a>
    </div>
    <div class="panel-heading">
            <h2>All Tags</h2>
        </div>
    <div class="panel panel-default">
        <div class="panel-body">
        @if ( ! $tags->isEmpty() )
            <table class="table table-hover">
                <thead>
                    <th>
                        Tag
                    </th>
                    <th>
                        Actions
                    </th>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>
                                {{ $tag->tag }}
                            </td>
                            <td>
                                <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}" class="btn btn-xs btn-info">
                                    Edit
                                </a>

                                <form action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" method="post" onclick="confirm('Sure to delete this tag?') ? '' : event.preventDefault()" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-xs">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center"><strong>You have not created any tags yet.</strong></p>
        @endif
        </div>
    </div>

@endsection
