@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Edit Blog Settings</h2>
        </div>

        <div class="panel-body">

            @include('admin.includes.errors')
            <form action="{{ route('settings.update') }}" method="post">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" name="site_name" id="site_name" class="form-control" value="{{ $setting->site_name }}">
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Phone</label>
                    <input type="text" name="contact_number" id="contact_number"  class="form-control" value="{{ $setting->contact_number }}">
                </div>

                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="email" name="contact_email" id="contact_email" class="form-control" value="{{ $setting->contact_email }}">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $setting->address }}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
