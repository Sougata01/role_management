<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function userList() {
        return view('users.userList');
    }
    public function addUser() {
        return view('users.addUser');
    }
}
