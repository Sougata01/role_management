@extends('layouts.main')
@section('content')
    <h1>{{ toUpperCase('this is userlist') }}</h1>
    @if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="table-responsive-lg">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">User</td>
                    <th scope="col">Role</td>
                    <th scope="col">Comment</td>
                    <th scope="col">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post['user'] }}</td>
                        <td>{{ $post['role'] }}</td>
                        <td>{{ $post['comment'] }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="#" class="btn btn-primary">Edit</a>
                                <form action="{{ route('account.deleteUser', ['post' => $post['id']]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
