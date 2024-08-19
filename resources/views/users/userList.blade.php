@extends('layouts.main')
@section('content')
    <h1>{{ toUpperCase('this is userlist') }}</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (count($posts) === 0)
        <p>Nothing to show</p>
    @else
        <div class="table-responsive-lg">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Role</th>
                        <th scope="col">Comment</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post['user'] }}</td>
                            <td>{{ $post['role'] }}</td>
                            <td style="max-width: 300px;">{{ $post['comment'] }}</td>
                            <td><a class="btn btn-primary" href="{{ route('account.editUser', ['post' => $post['id']]) }}">Edit</a></td>
                            <td>
                                <form action="{{ route('account.deleteUser', ['post' => $post['id']]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
