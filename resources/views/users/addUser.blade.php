@extends('layouts.main')
@section('content')
    <h2>ADD USER HERE</h2>
    <form action="{{ route('account.createUser') }}" method="post">
        @csrf
        <div class="row">

            <div class="col-xs-12 col-md-6 mb-3">
                <label for="user" class="form-label">User Name</label>
                <input type="text" id="user" class="form-control" name="user">
            </div>

            <div class="col-xs-12 col-md-6 mb-3">
                <label for="role" class="form-label">User Role</label>
                <input type="text" id="role" class="form-control" name="role">
            </div>

            <div class="col-xs-12 col-md-6 mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea id="comment" class="form-control" rows="6" name="comment"></textarea>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Add User</button>
    </form>
@endsection
