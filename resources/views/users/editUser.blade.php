@extends('layouts.main')
@section('content')
    <h2>EDIT USER</h2>
    <form action="{{ route('account.updateUser', ['post' => $post]) }}" method="post">
        @csrf
        @method('put')
        <div class="row">

            <div class="col-xs-12 col-md-6 mb-3">
                <label for="user" class="form-label">User Name</label>
                <input type="text" id="user" class="form-control" name="user" value="{{ $post->user }}">
            </div>

            <div class="col-xs-12 col-md-6 mb-3">
                <label for="role" class="form-label">User Role</label>
                <input type="text" id="role" class="form-control" name="role" value="{{ $post->role }}">
            </div>

            <div class="col-xs-12 col-md-6 mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea id="comment" class="form-control" rows="6" name="comment">{{ $post->comment }}</textarea>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
@endsection
