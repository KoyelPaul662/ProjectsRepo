<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Plan;
use Symfony\Component\HttpFoundation\Response;

class PlanController extends Controller
{
    public function addPlan(Request $req){
        $data =  $req->only('amount', 'month');
        $validator = Validator::make($data, [
            'amount' => 'required',
            'month' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['message' =>'Kindly Fill up Crendential Properly', 'code' => 2 ], 200);
        }
       $checkplan = Plan::where('amount','=',$req->amount)->first();
        if(!$checkplan){
            $Addplan =  Plan::create([
                'amount'=> $req->amount,
                'month'=> $req->month,
            ]);
            if($Addplan){
            return response()->json([
                'success' => true,
                'code' => 1,
                'message' => 'Plan created successfully',
                'data' => $Addplan
            ], Response::HTTP_OK);
            }
            else{
                return response()->json([
                    'success' => false,
                    'code' => 2,
                    'message' => 'Kindly Fill up Crendential Properly',
                    'data' => $Addplan
                ]);
            }
        }
        else{
            return response()->json([
                'success' => false,
                'code' => 2,
                'message' => 'Plan Already exists . Kindly Enter Another Amount',
            ]);
        }
        
    }


    public function getAmount(){
        $amt = Plan::orderBy('id','Desc')->get();
        $response = array(
            'data' => $amt,
        );
        return response()->json($response);
    }

    public function getMonth(Request $req){
        $amt = Plan::where('amount','=',$req->amt)->first();
        $response = array(
            'data' => $amt,
            'date' => date('Y-m-d'),
        );
        return response()->json($response);
    }

    public function getEditAmount(Request $req)
    {
        $id = $req->id;
        $data =Plan::where('id','=',$id)->first();
        return response()->json($data); 
    }

    public function UpdateAmount(Request $req){
        $id = $req->id;
        $amt = Plan::find($id);
        $amt->amount = $req->amount;
        $amt->month = $req->month;
        $checkplan = Plan::where('amount','=',$req->amount)->where('id','!=',$id)->first();
        if(!$checkplan){
            $amt->save();
            if($amt){
            return response()->json([
                'success' => true,
                'code' => 1,
                'message' => 'Updated successfully',
                'data' => $amt
            ], Response::HTTP_OK);
            }
            else{
                return response()->json([
                    'success' => false,
                    'code' => 2,
                    'message' => 'Kindly Fill up Crendential Properly',
                    'data' => $amt
                ]);
            }
        }
        else{
            return response()->json([
                'success' => false,
                'code' => 2,
                'message' => 'Plan Already exists . Kindly Enter Another Amount',
            ]);
        }
        
    }

    public function getDeletePost(Request $req)
    {
        $id = $req->id;
        $amt=Plan::find($id);
        $amt->delete();
        if($amt)
        {
        return response()->json([
            'success' => true,
            'code' => 1,
            'message' => 'Deleted successfully',
            'data' => $amt
        ], Response::HTTP_OK);
        }
        else{
            return response()->json([
                'success' => false,
                'code' => 2,
                'message' => 'Something went wrong',
                'data' => $amt
            ]);
        }
    }

}
