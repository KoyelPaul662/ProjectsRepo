<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\Subscription;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $email= $credentials['email'];
        $user=User::where('email','=',$email)->first();
        $userName= $user->name;
        $userid= $user->id;
        $userstatus='0';

        //check if user take subscription or not//
        $users=Subscription::where('userid','=',$userid)->first();
        if($users){
            $userstatus= '1';
        }
        else{
            $userstatus= '0';
        }

        //check if user's subscription validity expires or not//
        $usersr = Subscription::where('userid', '=', $userid)
                ->orderBy('id', 'DESC')
                ->first();
        if($usersr){
         $date= $usersr->date;   
         $strdate=strtotime($date);
         $month = $usersr->month;
         $validity = date("Y-m-d", strtotime("+$month month", $strdate));
         $post=$request->date;  
         //$post="2023-11-05";
         if (strtotime($post) > strtotime($validity)) {
            $userstatus= '2';
         }
        }      
        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 200);
        }
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                	'success' => false,
                	'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
    	// return $credentials;
            return response()->json([
                	'success' => false,
                	'message' => 'Could not create token.',
                ], 500);
        }
        //Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'code' => 1,
            'message' => 'Login Successfully',
            'token' => $token,
            'user_details' => $credentials['email'],
            'userName'=>$userName,
            'userid'=>$userid,
            'userstatus'=>$userstatus,
        ]);      
    }  
}
