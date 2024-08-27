<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // this method will show login page for customer
    public function index()
    {
        return view('auth.login');
    }

    // this method will authenticate user
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {

            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                // dd(Auth::guard('web')->check());
                return redirect()->route('account.dashboard');
            } else {
                return redirect()->route('account.login')->with('error', 'Either email or password is incorrect'); // session message to show for errors if login credentials are incorrect
            }
        } else {
            return redirect()->route('account.login')
                ->withInput() //so that form value doesn't get cleared
                ->withErrors($validator); //to display errors
        }
    }

    //this mehtod will show register page
    public function register()
    {
        return view('auth.register');
    }

    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer';
            $user->save();

            return redirect()->route('account.login')->with('success', 'you have registered successfully.');
        } else {
            return redirect()->route('account.register')
                ->withInput() //so that form value doesn't get cleared
                ->withErrors($validator); //to display errors
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
