<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function userList() {
        return view('users.userList');
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
}
