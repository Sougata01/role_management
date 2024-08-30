<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;

class UsersController extends Controller
{
    public function userList(Request $request)
    {
        // using user model
        $search = $request['search'] ?? "";
        if ($search) {
            $posts = auth()->user()->usersPosts()->latest()->where('user', 'LIKE', "%$search%")->orwhere('role', 'LIKE', "%$search%")->paginate(5);
        } else {
            $posts = auth()->user()->usersPosts()->latest()->paginate(5);
        }
        // dd($posts,$search);
        // using post model
        // $posts = Post::where('user_id',auth()->id())->latest()->get();
        return view('users.userList', ['posts' => $posts, 'search' => $search] );
    }

    public function addUser()
    {
        return view('users.addUser');
    }

    public function createUser(Request $request)
    {
        $incomingFields = $request->validate([
            'user' => 'required',
            'role' => 'required',
            'comment' => 'required'
        ]);

        //to prevent any code in input this strip_tags is used
        $incomingFields['user'] = strip_tags($incomingFields['user']);
        $incomingFields['role'] = strip_tags($incomingFields['role']);
        $incomingFields['comment'] = strip_tags($incomingFields['comment']);
        $incomingFields['user_id'] = auth()->id();

        // post model is to be created
        Post::create($incomingFields);

        return redirect()->route('account.userList')->with('success', 'User added successfully');
    }

    public function deleteUser(Post $post)
    {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
            return redirect()->route('account.userList')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('account.userList')->with('error', 'You are not authorized to delete.');
        }
    }

    public function editUser(Post $post)
    {
        return view('users.editUser', ['post' => $post]);
    }

    public function updateUser(Post $post, Request $request)
    {

        if (auth()->user()->id !== $post['user_id']) {
            return redirect()->route('account.userList')->with('error', 'You are not authorized to edit.');
        }

        $incomingFields = $request->validate([
            'user' => 'required',
            'role' => 'required',
            'comment' => 'required'
        ]);

        //to prevent any code in input this strip_tags is used
        $incomingFields['user'] = strip_tags($incomingFields['user']);
        $incomingFields['role'] = strip_tags($incomingFields['role']);
        $incomingFields['comment'] = strip_tags($incomingFields['comment']);

        $post->update($incomingFields);
        return redirect()->route('account.userList')->with('success', 'User updated successfully');
    }
}
