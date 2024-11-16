<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Doctors;
use App\Models\User;
use App\Models\Requests;
use App\Models\Specializations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function chartRegistration(){
        $days = 30; // Replace this with the desired number of days
        $results = User::selectRaw('DATE(created_at) AS reg_date, COUNT(*) AS count')
            ->where('created_at', '>=', now()->subDays($days))
            ->groupBy('reg_date')
            ->get();
        return $results;
    }

    public function doctorchartRegistration(){
        $days = 30; // Replace this with the desired number of days
        $results = Doctors::selectRaw('DATE(created_at) AS reg_date, COUNT(*) AS count')
            ->where('created_at', '>=', now()->subDays($days))
            ->groupBy('reg_date')
            ->get();
        return $results;
    }

    public function create(){
        return Inertia::render('admin/new-specialization');
    }

    public function store(Request $request){    
        $spcl= $request->validate([
                'title' => 'required',
            ]);
        Specializations::create($spcl);
        return Redirect::route('new-specialization')->with('c','Added Successfully');
    }

    public function index(){
        $Specializations= Specializations::all();
        return Inertia::render('admin/view-specialization',['Specializations'=>$Specializations]);
    }

    public function edit(Specializations $specialization){
        //dd($todo);
        return Inertia::render('admin/edit-specialization', ['Specialization' => $specialization]);
    }

    public function update(Request $request,Specializations $specialization){
       $validated=$request->validate([
        'title'=>'required',
       ]);
      $specialization->update($validated);
      return Redirect::route('view-specialization.index'); // Redirect to the todo list page
    }

    public function destroy(Specializations $Specialization){
        $Specialization->delete();
        return Redirect::route('view-specialization.index'); 
    }

    public function viewspecialization(){     
        $data = Specializations::orderBy('id','desc')->get();      
        return Inertia::render('admin/new-doctor',['data'=>$data]);
    }


    public function savedoctor(Request $req){
        $req->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'gender' => 'nullable',
                'day' => 'required',
                'time' => 'required',
                'totime'=>'required',
                'fees' => 'required',
                'age' => 'required',
                'specialization_id' => 'required',
                'phone' => 'required|digits:10',
                'email' => 'required|email|unique:doctor',
                'image'=>'nullable|mimes: jpg,jpeg,png|max:2048',
                'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
                'password_confirmation' => 'required',
            ]
        );
        $day=$req->day;
        $startTime = Doctors::where('day','=', $day)->pluck('time');
        $endTime = Doctors::where('day','=', $day)->pluck('totime');
        $doctorStart = $req->time;
        $doctorEnd = $req->totime;
        for ($i=0; $i < count($startTime); $i++) {
            if($doctorStart==$startTime[$i] || $doctorEnd == $endTime[$i] || $doctorStart == $endTime[$i] || $doctorEnd==$startTime[$i]){

                return redirect('new-doctor')->with('errormsg', 'Choose Another Schedule');
            }
            else if($doctorStart<$startTime[$i] && $doctorEnd<$endTime[$i] && $doctorEnd>$startTime[$i] ){
                return redirect('new-doctor')->with('errormsg', 'Choose Another Schedule');
            }
            else if($doctorStart<$startTime[$i] && $doctorEnd>$endTime[$i]){
                return redirect('new-doctor')->with('errormsg', 'Choose Another Schedule');
            }
            else if($doctorStart>$startTime[$i] && $doctorEnd<$endTime[$i]){
                return redirect('new-doctor')->with('errormsg', 'Choose Another Schedule');
            }
            else if($doctorStart>$startTime[$i] && $doctorEnd>$endTime[$i] && $doctorStart<$endTime[$i]){
                return redirect('new-doctor')->with('errormsg', 'Choose Another Schedule');
            }
        }   
        // dd($startTime);
        $member = new Doctors();
        $member->name = $req->name;
        $member->address = $req->address;
        $member->gender = $req->gender;
        $member->phone = $req->phone;
        $member->email = $req->email;
        $member->day = $req->day;
        $member->fees = $req->fees;
        $member->time = $req->time;
        $member->totime = $req->totime;
        $member->age = $req->age;
        $member->specialization_id = $req->specialization_id;     
        $member->password = hash::make($req->password);
        if($req->file('image'))
        {
            $imgname= time().'up'.$req->file('image')->getClientOriginalName();
            $imgpath="doctor-images/";
            $req->file('image')->move($imgpath,$imgname);
            $member->image ="$imgname";
        }
                $member->save();
        return redirect('new-doctor')->with('success', 'saved successfully');
    }

    public function ViewDoctor(){
        $Doctors= Doctors::orderBy('id','desc')->Paginate(3);
        return Inertia::render('admin/view-doctor',['Doctors'=>$Doctors]);
    }

    public function doctoredit(Doctors $doctor){
        return Inertia::render('admin/edit-doctor', ['Doctor' => $doctor]);
    }

    public function doctorupdate(Request $request,  $id){
        // Validate the incoming request data
        $user = Doctors::find($id);
        $day=$request->day;
        $startTime = Doctors::where('day','=', $day)->where('id','!=',$user->id)->pluck('time');
        $endTime = Doctors::where('day','=', $day)->where('id','!=',$user->id)->pluck('totime');
        $doctorStart = $request->time;
        $doctorEnd = $request->totime;
        for ($i=0; $i < count($startTime); $i++) {
            if($doctorStart==$startTime[$i] || $doctorEnd == $endTime[$i] || $doctorStart == $endTime[$i] || $doctorEnd==$startTime[$i]){
                return back()->with('errormsg', 'Choose Another Schedule');
            }
            else if($doctorStart<$startTime[$i] && $doctorEnd<$endTime[$i] && $doctorEnd>$startTime[$i] ){
                return back()->with('errormsg', 'Choose Another Schedule');
            }
            else if($doctorStart<$startTime[$i] && $doctorEnd>$endTime[$i]){
                return back()->with('errormsg', 'Choose Another Schedule');
            }
            else if($doctorStart>$startTime[$i] && $doctorEnd<$endTime[$i]){
                return back()->with('errormsg', 'Choose Another Schedule');
            }
            else if($doctorStart>$startTime[$i] && $doctorEnd>$endTime[$i] && $doctorStart<$endTime[$i]){
                return back()->with('errormsg', 'Choose Another Schedule');
            }
        }   
        // Update the user's information
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->age=$request->age;
        $user->day=$request->day;
        $user->time=$request->time;
        $user->totime=$request->totime;
        $user->fees=$request->fees;

        if($request->file('image'))
        {
            $imgname= time().'up'.$request->file('image')->getClientOriginalName();
            $imgpath="doctor-images/";
            $request->file('image')->move($imgpath,$imgname);
            $user->image ="$imgname";
        }
        $user->save();
        // Redirect back to the user's profile page or any other relevant page
        return redirect('view-doctor');
    }

    public function doctordelete(Doctors $doctor){
        $doctor->delete();
        return Redirect::route('view-doctor.index'); 
    }

    public function doctorgetApprove($id){
        $del =  Doctors::where('id', $id)->update(['status' => '1']);
        return back();   
    } 
    
    public function doctorgetUnApprove($id){
        $del =  Doctors::where('id', $id)->update(['status' => '0']);
        return back();   
    }

    public function ViewUser(){
        $Users= User::orderBy('id','desc')->Paginate(3);
        return Inertia::render('admin/user',['Users'=>$Users]);
    }

    public function usergetApprove($id){
        $del =  User::where('id', $id)->update(['status' => '1']);
        return back();   
    } 
    
    public function usergetUnApprove($id){
        $del =  User::where('id', $id)->update(['status' => '0']);
        return back();   
    }

    public function AllUserRequest(){     
        $datareqs = Requests::orderBy('id','desc')->paginate(3); 
        //dd($datareqs);  
        return Inertia::render('admin/user-request',['datareqs'=>$datareqs]);
    }
   
    public function getApprove($id){
        $del =  Requests::where('id', $id)->update(['status' => 'A']);
        return back();
    } 
    
    public function getReject($id){
        $del =  Requests::where('id', $id)->update(['status' => 'R']);
        return back(); 
    }

    public function DoctorScheduleList()
    {
        $Sundayrecord = Doctors::where('day','=','Sunday')->where('status','=','1')->with('specialization')->get();
        //dd($Sundayrecord);
        $Mondayrecord = Doctors::where('day','=','Monday')->where('status','=','1')->with('specialization')->get();
        $TuesDayrecord = Doctors::where('day','=','TuesDay')->where('status','=','1')->with('specialization')->get();
        $Wednesdayrecord = Doctors::where('day','=','Wednesday')->where('status','=','1')->with('specialization')->get();
        $Thursdayrecord = Doctors::where('day','=','Thursday')->where('status','=','1')->with('specialization')->get();
        $Fridayrecord = Doctors::where('day','=','Friday')->where('status','=','1')->with('specialization')->get();
        $Saturdayrecord = Doctors::where('day','=','Saturday')->where('status','=','1')->with('specialization')->get();

        return Inertia::render('admin/doctor-schedule',['Sundayrecord'=>$Sundayrecord, 'Mondayrecord'=>$Mondayrecord,'TuesDayrecord'=>$TuesDayrecord,'Wednesdayrecord'=>$Wednesdayrecord,'Thursdayrecord'=>$Thursdayrecord,'Fridayrecord'=>$Fridayrecord,'Saturdayrecord'=>$Saturdayrecord]);
    }

    public function viewDynamicData(Request $req){     
        $datauser = User::all();
        $datauser= count($datauser);
        $datadoctor = Doctors::all();
        $datadoctor= count($datadoctor);
        $datareqalls = Requests::all();
        $datareqalls= count($datareqalls);      
        return Inertia::render('admin/admindashboard',compact('datauser','datadoctor','datareqalls'));
    }
}
