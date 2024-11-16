<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LoginController extends Controller{
    public function user_login(){
        if (Auth::guard('hospital')->check()) {
            return Redirect::route('doctordashboard');
        } elseif(Auth::guard('admin')->check()){
            return Redirect::route('admindashboard');
        }
        elseif(Auth::guard('user')->check()){
            return Redirect::route('userdashboard');
        }
        return Inertia::render('logins');
    }

    public function login(Request $req){
        $req->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

        if(Auth::guard('admin')->attempt($req->only(['email', 'password']))){
            return Redirect::route('admindashboard');
        }
        elseif(Auth::guard('hospital')->attempt($req->only(['email', 'password']))){
            return Redirect::route('doctordashboard');
        }
        elseif(Auth::guard('user')->attempt($req->only(['email', 'password']))){
            $user = Auth::guard('user')->user();
            if ($user->status == 1) {
                // dd(Auth::user());
                return Redirect::route('userdashboard');
            } else {
                Auth::guard('user')->logout();
                return Redirect::route('alllogin')->with('errormsg', 'User account is not active.');
            }
        }
        return Redirect::route('alllogin')->with('errormsg', 'Invalid Email or Password');
    }

 
    public function logout(){
        // dd('logout');
        if (Auth::guard('hospital')->check()) {
            Auth::guard('hospital')->logout();
        } elseif(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
        elseif(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        return Redirect::route('alllogin');
    }

}