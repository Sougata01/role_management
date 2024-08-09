@extends('layouts.main')
@section('content')
    <h2>ADD USER HERE</h2>
    <form class="row" action="{{route('account.createUser')}}" method="post">
        @csrf
        <div class="col-xs-12 col-lg-6 mb-3">
            <label for="user" class="form-label">User Name:</label>
            <input type="text" id="user" name="user" class="form-control">
        </div>
        <div class="col-xs-12 col-lg-6 mb-3">
            <label for="role" class="form-label">User Role:</label>
            <input type="text" id="role" name="role" class="form-control">
        </div>
        <div class="col-xs-12 col-lg-6 mb-3">
            <label for="comment" class="form-label">Comments:</label>
            <textarea id="comment" name="comment" class="form-control"></textarea>
        </div>
        <div class="d-flex justify-content-start">
            <button type="submit" class="btn btn-primary">Add User</button>
        </div>
    </form>
@endsection
