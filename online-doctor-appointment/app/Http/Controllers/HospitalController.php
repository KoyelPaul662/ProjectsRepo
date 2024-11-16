<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Hospitals;
use App\Models\Requests;
$t=time();
date_default_timezone_set('Asia/Kolkata');

class HospitalController extends Controller
{
    function submit(Request $request)
    {       
        $options = $request->input('items', []);
        $options_data = [];

        foreach ($options as $key => $value) {  
                $password=hash::make($value['hospital_password']);          
                $options_data[] = ['name' => $value['hospital_name'], 'email' => $value['hospital_email'],'phone' => $value['hospital_phone'],'address' => $value['hospital_address'],'password' => $password,'role' => 'hospital','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")];            
        }    
        // User::insert($options_data);        
        Hospitals::insert($options_data); 
                $response = [
                    "status" => 200,
                    "message" => "saved successfully",
                    "data" => []
                ];
        return response()->json($response);
    }


    public function view(Request $req){     
        $data = Hospitals::orderBy('id','asc');
        $data = $data->paginate(5);       
        return view('doctor/table',compact('data'));
    }

    public function edit($id){
        $edit = Hospitals::find($id);
        return view('doctor/editform',compact('edit'));
    }
    
    public function update(Request $request,  $user)
    {
        // Validate the incoming request data
        $user = Hospitals::find($user);
        // Update the user's information
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->save();
        // Redirect back to the user's profile page or any other relevant page
        return redirect()->route('view-hospital');
    }

    public function delete($id){
        $studentData = Hospitals::find($id);
        if (!is_null($studentData)) {
            $studentData->delete();
            session()->flash('success', 'deleted successfully');
        } else {
            session()->flash('error', 'Student not found');
        }
        return back()->with('flash-success', true);
    }

    public function AllRequest(Request $req){     
        
         $doctorids=Auth::guard('hospital')->user()->id; 
         //dd($doctorids);
         $datareq = Requests::orderBy('id','asc');
         $datareq= $datareq->where('doctorid','Like',"%$doctorids%")->paginate(5);  
        return view('doctor/all-request',compact('datareq'));
    }

    public function DoctorDynamicData(Request $req){
        $doctorids=Auth::guard('hospital')->user()->id; 
        //dd($doctorids);  
        $totalreq = Requests::where('doctorid','=',$doctorids)->get();
        $totalreq= count($totalreq);
        $totalapreq = Requests::where('doctorid','=',$doctorids)->where('status','=','A')->get();
        $totalapreq= count($totalapreq);
        $totalcanreq = Requests::where('doctorid','=',$doctorids)->where('status','=','C')->get();
        $totalcanreq= count($totalcanreq);
        $totalRejreq = Requests::where('doctorid','=',$doctorids)->where('status','=','R')->get();
        $totalRejreq= count($totalRejreq);
         
        return view('doctor/hospital-dashboard',compact('totalreq','totalapreq','totalcanreq','totalRejreq'));
    }

}
