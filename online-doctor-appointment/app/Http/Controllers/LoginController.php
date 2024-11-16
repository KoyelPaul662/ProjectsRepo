<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Doctors;
use App\Models\Feedback;

class LoginController extends Controller{
    public function user_login(){
        if (Auth::guard('hospital')->check()) {
            return redirect('doctor-dashboard');
        } elseif(Auth::guard('admin')->check()){
            return redirect('admin-dashboard');
        }
        elseif(Auth::guard('user')->check()){
            return redirect('user-dashboard');
        }
        return view('user-login');
    }

    public function login(Request $req){
        if(Auth::guard('admin')->attempt($req->only(['email', 'password']))){
            return redirect('admin-dashboard');
        }
        elseif(Auth::guard('hospital')->attempt($req->only(['email', 'password']))){
            return redirect('doctor-dashboard');
        }
        elseif(Auth::guard('user')->attempt($req->only(['email', 'password']))){
            $user = Auth::guard('user')->user();
            if ($user->status == 1) {
                return redirect('user-dashboard');
            } else {
                Auth::guard('user')->logout();
                return redirect('user-login')->with('errormsg', 'User account is not active.');
            }
        }
        return redirect('user-login')->with('errormsg', 'Invalid Email or Password');
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
        return redirect('user-login');
    }

    public function index(){
        $data = Doctors::all();
       // dd($data);
       if (Auth::guard('hospital')->check()) {
            return redirect('doctor-dashboard');
        } elseif(Auth::guard('admin')->check()){
            return redirect('admin-dashboard');
        }
        elseif(Auth::guard('user')->check()){
            return redirect('user-dashboard');
        }
        return view('index',compact('data'));
    }

    
    public function feedback(Request $req){
        $req->validate(
            [
                'name' => 'required',
                'contact' => 'required',
                'feedback' => 'required',
            ]
        );
        $fb = new Feedback;
        $fb->name = $req->name;
        $fb->contact = $req->contact;
        $fb->feedback = $req->feedback;
        $fb->save();
        return redirect('/')->with('success','Sent Successfully');
    }
}