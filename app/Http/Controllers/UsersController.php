<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function userList() {
        $posts = [];
        if(auth()->check()) {
            //using Post model
            // $posts = Post::where('user_id',auth()->id())->get();
            // using User model
            $posts = auth()->user()->usersPosts()->latest()->get();
        }
        return view('users.userList', ['posts'=>$posts]);
    }
    public function addUser() {
        return view('users.addUser');
    }
    public function createUser(Request $request){
        $incomingFields = $request->validate([
            'user'=> 'required',
            'role'=> 'required',
            'comment'=> 'required'
        ]);
        //to prevent any code in input this strip_tags is used
        $incomingFields['user'] = strip_tags($incomingFields['user']);
        $incomingFields['role'] = strip_tags($incomingFields['role']);
        $incomingFields['comment'] = strip_tags($incomingFields['comment']);
        $incomingFields['user_id'] = auth()->id();
        // post model is to be created
        Post::create($incomingFields);
        return redirect()->route('account.userList');
    }

    public function deleteUser(User $user) {
        $user->delete();
        return redirect(route('account.userList'))->with('success', 'User deleted successfully');
    }
}