<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('Admin.Auth.login');
    }
    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            // if successful, then redirect to their intended location
            // return redirect()->intended(route('admin.home'));
            return redirect(route('admin.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function dashboard(){
        return view('Admin.dashboard');
    }

    public function logout(){
        try{
            auth('admin')->logout();
            return redirect(route('admin.login'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }
}
