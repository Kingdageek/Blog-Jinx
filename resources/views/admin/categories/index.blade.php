@extends('layouts.app')
@section('content')
    <div>
        <a href="{{ route('categories.create') }}" class="btn btn-success text-right">Create new category</a>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Category Name
                    </th>
                    <th>
                        Actions
                    </th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-xs btn-info">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post" onclick="confirm('Sure to delete this category?') ? '' : event.preventDefault()" style="display:inline-block">
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
