@extends('layouts.main')
@section('content')
    <h1>{{toUpperCase('this is userlist')}}</h1>
    <div class="table-responsive-lg">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">User</td>
                <th scope="col">Role</td>
                <th scope="col">Comment</td>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{$post['user']}}</td>
                <td>{{$post['role']}}</td>
                <td>{{$post['comment']}}</td>
                <td><a href="#">Edit</a></td>
                <td>
                    <form action="#" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection