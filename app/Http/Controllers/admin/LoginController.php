<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //This will show admin login page
    public function index(){
        return view('admin.login');
    }

    // this method will authenticate admin user
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                // dd(Auth::user());
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login')->with('error', 'Either email or password is incorrect'); // session message to show for errors if login credentials are incorrect
            }
        } else {
            return redirect()->route('admin.login')
                ->withInput() //so that form value doesn't get cleared
                ->withErrors($validator); //to display errors
        }
    }
}
