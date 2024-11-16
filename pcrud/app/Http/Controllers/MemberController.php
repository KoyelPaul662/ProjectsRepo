<?php

namespace App\Http\Controllers;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class MemberController extends Controller
{
function savedata(Request $req)
{
    $req->validate(
        [
        'name'=>'required',
        'email'=>'required|email|unique:members',
        'password'=>['required','confirmed',Password::min(8)->mixedCase()->numbers()->symbols()],
        'password_confirmation'=>'required',
        'image'=>'nullable|mimes: jpg,jpeg,png|max:2048',
        ]
        );
$member = new Register;
$member->name =$req->name;
$member->email =$req->email;
$member->password =hash::make($req->password);
$imgname= time().'img'.$req->file('image')->getClientOriginalName();
$imgpath="images/";
$req->file('image')->move($imgpath,$imgname);
$member->image ="$imgname";
$member->save();
return redirect('/')->with('success','Added');

}

function view(Request $req)
{
    if(Auth::guard('member')->check()) {
        return redirect('dashboard');
    }
   

   
$search = $req['search']??"";
if($search!="")
{
$data= Register::where('name','Like',"%$search%")->orWhere('email','LIKE',"%$search%")->get();    
}
else
{        
$data = Register::all();
}
return view('form',compact('data','search'));

}

function edit($id)
{
$edit = Register::find($id);
return view('editform',compact('edit'));

}

function update($id,Request $req)
{
$std = Register::where('id','=',$id)->first();
if($req->file('image'))
{
$imgname= time().'up'.$req->file('image')->getClientOriginalName();
$imgpath="images/";
$req->file('image')->move($imgpath,$imgname);
$std->image ="$imgname";
}


$std->name =$req->name;
$std->email =$req->email;
$std->password =$req->password;

$std->save();
return redirect('/');

}

function delete($id)
{
 $del = Register::find($id);
 $del->delete();
 return redirect('/');   
}

// function login(Request $req)
// {
// $user= Register::where('email','=',$req->email)->first();
// $pass= $user->password;
// $reqpass = $req->password;
// if(!$user || !hash::check($reqpass,$pass))
// {
// return redirect('login')->with('invalidpass','user name or password is invalid');
// } 

// else
// {
//     $req->session()->put('user',$user);

//     return redirect('dashboard');        
// }


// }

    public function login(Request $req){
        $user = Auth::guard('member')->attempt($req->only(['email', 'password']));
        if($user){
            return redirect('dashboard');
        }
        else{
            return redirect('login')->with('error','Invalid Crendentials');
        }
    }

    public function logout(){
        if(Auth::guard('member')->check()){
            Auth::guard('member')->logout();
            return redirect('login');
        }
    }

    public function loginview(){
        if(Auth::guard('member')->check()){
            return redirect('dashboard');
        }
        else{
            return view('login');
        }
    }
    
  
}