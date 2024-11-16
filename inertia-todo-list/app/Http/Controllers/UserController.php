<?php
namespace App\Http\Controllers;
use App\Models\Doctors;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Requests;
use App\Models\Specializations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function savedata(Request $req){
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
        return redirect('/sign-up')->with('success', 'Registered successfully');
    }

    public function viewspecialization(){     
        $data = Specializations::orderBy('id','desc')->get();      
        return Inertia::render('user/new-request',['data'=>$data]);
    }

    public function searchdoctor(Request $req){  
        $data = Specializations::orderBy('id','desc')->get();      
        $search = $req->specialization_id;
        //dd($search);
        // $dataForSpecial = Doctors::orderBy('id','asc')->get();
        $dataForSpecial= Doctors::where('specialization_id','Like',"%$search%")->get();   
        //dd($dataForSpecial);  
        return Inertia::render('user/new-request',['dataForSpecial'=>$dataForSpecial,'data'=>$data]);
    }

    public function BookRequest($id){
        $doctorid = Doctors::find($id);
        return Inertia::render('user/book-request',['doctorid'=>$doctorid]);
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
        $datareq = Requests::where('session','=',$userids)->orderBy('id','desc')->paginate(3);     
        //dd($datareq);
        return Inertia::render('user/view-request',['datareq'=>$datareq]);
    }

    public function usergetCancel($id){
        $del =  Requests::where('id', $id)->update(['status' => 'C']);
        return back();  
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
        return Inertia::render('user/userdashboard',compact('totalreq','totalapreq','totalcanreq','totalRejreq'));
    }
}
