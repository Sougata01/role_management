@extends('layouts.main')
@section('content')
    <h1>{{ toUpperCase('this is userlist') }}</h1>
    <div class="table-responsive-lg">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">User</td>
                    <th scope="col">Role</td>
                    <th scope="col">Comment</td>
                    <th scope="col">
                        </td>
                    <th scope="col">
                        </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post['user'] }}</td>
                        <td>{{ $post['role'] }}</td>
                        <td>{{ $post['comment'] }}</td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('account.deleteUser'), ['user' => $post['id']] }}" method="post">
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
@endsection
