<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Requests;
use App\Models\Specializations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function savedata(Request $req)
    {
        $req->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'phone' => 'required|digits:10',
                'email' => 'required|email|unique:users',
                'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
                'password_confirmation' => 'required',
            ]
        );
        $member = new User;
        $member->name = $req->name;
        $member->address = $req->address;
        $member->gender = $req->gender;
        $member->phone = $req->phone;
        $member->email = $req->email;
        $member->role = 'user';
        $member->password = hash::make($req->password);
        $member->save();
        return redirect('registration')->with('success', 'saved successfully');
    }

    public function viewspecialization(){     
        $data = Specializations::orderBy('id','desc')->get();      
        return view('user.new-request',compact('data'));
    }

    public function searchdoctor(Request $req){  
        $data = Specializations::orderBy('id','desc')->get();      
        $search = $req->specialization_id;
        $dataForSpecial = Doctors::orderBy('id','asc');
        $dataForSpecial= $dataForSpecial->where('specialization_id','Like',"%$search%");           
        $dataForSpecial = $dataForSpecial->paginate(5);       
        return view('user.new-request',compact('dataForSpecial','data'));
    }

    public function BookRequest($id){
        $doctorid = Doctors::find($id);
        return view('user.book-request',compact('doctorid'));
    }

    public function SaveRequest(Request $req)
    {
        $req->validate(
            [
                'doctorname' => 'required',
                'doctorday' => 'required',
                'doctortime' => 'required',
                'totime' => 'required',
                'specialization_id' => 'required',
                'name' => 'required',
                'gender' => 'required',
                'phone' => 'required|digits:10',         
                'alternatephone' => 'required|digits:10',         
            ]
        );
        $members = new Requests;
        $members->doctorname = $req->doctorname;
        $members->doctorday = $req->doctorday;
        $members->doctortime = $req->doctortime;
        $members->totime = $req->totime;
        $members->specialization_id = $req->specialization_id;
        $members->session = $req->session;
        $members->email = $req->email;
        $members->doctorid = $req->doctorid;
        $members->doctorfees = $req->doctorfees;
        $members->age = $req->age;
        $members->name = $req->name;
        $members->gender = $req->gender;
        $members->phone = $req->phone;
        $members->alternatephone = $req->alternatephone;
        $members->save();
        return back()->with('success', 'Send successfully');
    }

    public function ViewRequest(){  
        $userids=Auth::guard('user')->user()->id;    
        $datareq = Requests::where('session','=',$userids)->orderBy('id','desc')->paginate(5);     
        return view('user.view-request',compact('datareq'));
    }

    public function usergetCancel($id){
        $del =  Requests::where('id', $id)->update(['status' => 'C']);
        if (($del)) {
            session()->flash('success', 'Cancelled successfully');
        } else {
            session()->flash('error', 'data not found');
        }
        return back()->with('flash-success', true);  
    }

    public function UserDynamicData(Request $req){
        $doctorids=Auth::guard('user')->user()->id; 
        $totalreq = Requests::where('session','=',$doctorids)->where('status','=','p')->get();
        $totalreq= count($totalreq);
        $totalapreq = Requests::where('session','=',$doctorids)->where('status','=','A')->get();
        $totalapreq= count($totalapreq);
        $totalcanreq = Requests::where('session','=',$doctorids)->where('status','=','C')->get();
        $totalcanreq= count($totalcanreq);
        $totalRejreq = Requests::where('session','=',$doctorids)->where('status','=','R')->get();
        $totalRejreq= count($totalRejreq);
        return view('user.user-dashboard',compact('totalreq','totalapreq','totalcanreq','totalRejreq'));
    }
}
