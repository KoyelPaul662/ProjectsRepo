<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Doctors;
use App\Models\Feedback;
use App\Models\Requests;
use Illuminate\Http\Request;
use App\Models\Specializations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function savespecialization(Request $req){
        $req->validate(
            [
                'title' => 'required',
            ]
        );
        $spe = new Specializations;
        $spe->title = $req->title;
        $spe->save();
        return redirect('new-specialization')->with('success','Added Successfully');
    }

    public function view(Request $req){     
        $data = Specializations::orderBy('id','asc');
        $data = $data->paginate(5);       
        return view('admin.view-specialization',compact('data'));
    }
    public function edit($id){
        $edit = Specializations::find($id);
        return view('admin.specialization-edit-form',compact('edit'));
    }

    public function update(Request $request,  $user) {
        $user = Specializations::find($user);
        $user->title=$request->title;
        $user->save();
        return redirect('view-specialization');
    }

    public function delete($id){
        $studentData = Specializations::find($id);
        if (!is_null($studentData)) {
            $studentData->delete();
            session()->flash('success', 'deleted successfully');
        } else {
            session()->flash('error', 'data not found');
        }
        return back()->with('flash-success', true);
    }

    // doctors function starts
    public function viewspecialization(){     
        $data = Specializations::orderBy('id','desc')->get();      
        return view('admin.new-doctor',compact('data'));
    }

    public function savedoctor(Request $req){
        $req->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'gender' => 'required',
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

                return redirect('new-doctor')->with('error', 'Choose Another Schedule');
            }
            else if($doctorStart<$startTime[$i] && $doctorEnd<$endTime[$i] && $doctorEnd>$startTime[$i] ){
                return redirect('new-doctor')->with('error', 'Choose Another Schedule');
            }
            else if($doctorStart<$startTime[$i] && $doctorEnd>$endTime[$i]){
                return redirect('new-doctor')->with('error', 'Choose Another Schedule');
            }
            else if($doctorStart>$startTime[$i] && $doctorEnd<$endTime[$i]){
                return redirect('new-doctor')->with('error', 'Choose Another Schedule');
            }
            else if($doctorStart>$startTime[$i] && $doctorEnd>$endTime[$i] && $doctorStart<$endTime[$i]){
                return redirect('new-doctor')->with('error', 'Choose Another Schedule');
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


    public function viewdoctor(Request $req){     
        $data = Doctors::orderBy('id','desc');
        $data = $data->paginate(5);       
        return view('admin.view-doctor',compact('data'));
    }

    public function doctoredit($id){
        $edit = Doctors::find($id);
        return view('admin.doctoreditform',compact('edit'));
    }

    public function doctorupdate(Request $request,  $user)
    {
        // Validate the incoming request data
        $user = Doctors::find($user);
        $day=$request->day;
        $startTime = Doctors::where('day','=', $day)->where('id','!=',$user->id)->pluck('time');
        $endTime = Doctors::where('day','=', $day)->where('id','!=',$user->id)->pluck('totime');
        $doctorStart = $request->time;
        $doctorEnd = $request->totime;
        for ($i=0; $i < count($startTime); $i++) {
            if($doctorStart==$startTime[$i] || $doctorEnd == $endTime[$i] || $doctorStart == $endTime[$i] || $doctorEnd==$startTime[$i]){
                return back()->with('error', 'Choose Another Schedule');
            }
            else if($doctorStart<$startTime[$i] && $doctorEnd<$endTime[$i] && $doctorEnd>$startTime[$i] ){
                return back()->with('error', 'Choose Another Schedule');
            }
            else if($doctorStart<$startTime[$i] && $doctorEnd>$endTime[$i]){
                return back()->with('error', 'Choose Another Schedule');
            }
            else if($doctorStart>$startTime[$i] && $doctorEnd<$endTime[$i]){
                return back()->with('error', 'Choose Another Schedule');
            }
            else if($doctorStart>$startTime[$i] && $doctorEnd>$endTime[$i] && $doctorStart<$endTime[$i]){
                return back()->with('error', 'Choose Another Schedule');
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

    public function doctordelete($id){
        // dd('doctor');
        $studentData = Doctors::find($id);
        if (!is_null($studentData)) {
            $studentData->delete();
            session()->flash('success', 'deleted successfully');
        } else {
            session()->flash('error', 'doctor not found');
        }
        return back()->with('flash-success', true);
    }

    public function AllUserRequest(Request $req){     
        $datareqs = Requests::orderBy('id','desc');
        $datareqs = $datareqs->paginate(5);       
        return view('admin.user-request',compact('datareqs'));
    }
   
    public function getApprove($id){
        $del =  Requests::where('id', $id)->update(['status' => 'A']);
        $userid=Requests::find($id);
        // dd($userid);
        if (($del)) {
            $details = [
                'title' => 'Mail from SentientGeeks',
                'body' => 'Hello,  ' . $userid->name,
                'main' => 'Congratulation Your Appointment has been confirmed.',
                'submain' =>'Stay connected with us.',
                'submains' =>'Thank You for choosing us!!',
            ];
            Mail::to($userid->email)->send(new \App\Mail\SendMail($details));
            session()->flash('success', 'confirmed successfully');
        } else {
            session()->flash('error', 'data not found');
        }
        return back()->with('flash-success', true);
    } 
    
    public function getReject($id){
        $del =  Requests::where('id', $id)->update(['status' => 'R']);
        $userid=Requests::find($id);
        if (($del)) {
            $details = [
                'title' => 'Mail from SentientGeeks',
                'body' => 'Hello,  ' . $userid->name,
                'main' => 'We are regret to inform you that Your appointment is not confirmed.',
                'submain' =>'Stay connected with us.',
                'submains' =>'Thank You for choosing us!!',
            ];

            Mail::to($userid->email)->send(new \App\Mail\SendMail($details));
            session()->flash('rejectsuccess', 'cancelled successfully');
        } else {
            session()->flash('error', 'data not found');
        }
        return back()->with('flash-rejectsuccess', true);  
    }

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

    public function updateStatus(Request $request)
    {
        $idsArr = $request->input('idsArr');
        //dd($idsArr);
        if(count($idsArr)>0){       
            Doctors::whereIn('id', $idsArr)->update(['status' => '1']);
            $response = [
                "status" => 200,
                "message" => "Activate successfully",
                "data" => []
            ];
            return response()->json($response);
        }
        else{
            $response = [
                "status" => 200,
                "message" => "Nothing To activate",
                "data" => []
            ];
            return response()->json($response);
        }
    }

    public function updateDeactiveStatus(Request $request)
    {
        $idsArr = $request->input('idsArr');
        if(count($idsArr)>0){       
            Doctors::whereIn('id', $idsArr)->update(['status' => '0']);
            $response = [
                "status" => 200,
                "message" => "DeActivate successfully",
                "data" => []
            ];
            return response()->json($response);
        }
        else{
            $response = [
                "status" => 400,
                "message" => "Nothing To Deactivate",
                "data" => []
            ];
            return response()->json($response);
        }
    }

    public function deleteall(Request $request){
        $idsArr = $request->input('idsArr');
        if(count($idsArr)>0){       
            Doctors::whereIn('id', $idsArr)->delete();
            $response = [
                "status" => 200,
                "message" => "successfully deleted",
                "data" => []
            ];
            return response()->json($response);
        }
        else{
            $response = [
                "status" => 400,
                "message" => "Nothing To delete",
                "data" => []
            ];
            return response()->json($response);
        }
    }

    public function doctorgetApprove($id){
        $del =  Doctors::where('id', $id)->update(['status' => '1']);
        return back();   
    } 
    
    public function doctorgetUnApprove($id){
        $del =  Doctors::where('id', $id)->update(['status' => '0']);
        return back();   
    }

    public function UserView(Request $req){     
        $data = User::orderBy('id','desc');
        $data = $data->paginate(5);       
        return view('admin.user-view',compact('data'));
    }


    // For users
    public function usergetApprove($id){
        $del =  User::where('id', $id)->update(['status' => '1']);
        return back();   
    } 
    
    public function usergetUnApprove($id){
        $del =  User::where('id', $id)->update(['status' => '0']);
        return back();   
    }

    public function userallupdateStatus(Request $request)
    {
        $idsArr = $request->input('idsArr');
        //dd($idsArr);
        if(count($idsArr)>0){       
            User::whereIn('id', $idsArr)->update(['status' => '1']);
            $response = [
                "status" => 200,
                "message" => "Activate successfully",
                "data" => []
            ];
            return response()->json($response);
        }
        else{
            $response = [
                "status" => 200,
                "message" => "Nothing To activate",
                "data" => []
            ];
            return response()->json($response);
        }
    }

    public function userallupdateDeactiveStatus(Request $request){
        $idsArr = $request->input('idsArr');
        if(count($idsArr)>0){       
            User::whereIn('id', $idsArr)->update(['status' => '0']);
            $response = [
                "status" => 200,
                "message" => "DeActivate successfully",
                "data" => []
            ];
            return response()->json($response);
        }
        else{
            $response = [
                "status" => 400,
                "message" => "Nothing To Deactivate",
                "data" => []
            ];
            return response()->json($response);
        }
    }

    public function viewDynamicData(Request $req){     
        $datauser = User::all();
        $datauser= count($datauser);
        $datadoctor = Doctors::all();
        $datadoctor= count($datadoctor);
        $datareqalls = Requests::all();
        $datareqalls= count($datareqalls);      
        return view('admin.admin-dashboard',compact('datauser','datadoctor','datareqalls'));
    }

    public function DoctorScheduleList()
    {
        $Sundayrecord = Doctors::where('day','=','Sunday')->where('status','=','1')->get();
        $Mondayrecord = Doctors::where('day','=','Monday')->where('status','=','1')->get();
        $TuesDayrecord = Doctors::where('day','=','TuesDay')->where('status','=','1')->get();
        $Wednesdayrecord = Doctors::where('day','=','Wednesday')->where('status','=','1')->get();
        $Thursdayrecord = Doctors::where('day','=','Thursday')->where('status','=','1')->get();
        $Fridayrecord = Doctors::where('day','=','Friday')->where('status','=','1')->get();
        $Saturdayrecord = Doctors::where('day','=','Saturday')->where('status','=','1')->get();
        return view('admin.doctor-schedule',compact('Sundayrecord','Mondayrecord','TuesDayrecord','Wednesdayrecord','Thursdayrecord','Fridayrecord','Saturdayrecord'));
    }

    public function ViewFeedback(){
       $data= Feedback::orderBy('id','desc');
       $data = $data->paginate(5);       
        return view('admin.view-feedback',compact('data'));
    }

  
}
