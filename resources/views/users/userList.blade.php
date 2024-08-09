@extends('layouts.main')
@section('content')
    <h1>{{toUpperCase('this is userlist')}}</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">User</td>
                <th scope="col">Role</td>
                <th scope="col">Comment</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($posts as $post)
                <td>{{$post['user']}}</td>
                <td>{{$post['role']}}</td>
                <td>{{$post['comment']}}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
@endsection