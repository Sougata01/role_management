@extends('layouts.main')
@section('content')
    <h2>ADD USER HERE</h2>
    <form action="{{route('account.createUser')}}" method="post">
        @csrf
        <input type="text" name="user" placeholder="User Name">
        <input type="text" name="role" placeholder="User Role">
        <textarea name="comment" placeholder="Type comments here...">
        </textarea>
        <button type="submit">Add User</button>
    </form>
@endsection
