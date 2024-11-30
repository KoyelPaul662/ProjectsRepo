<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class RegistrationController extends Controller
{
    public function store(Request $request){
        $member = new User();
        $member->name = $request->name;
        $member->address = $request->address;
        $member->gender = $request->gender;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->age = $request->age;
        $member->password = hash::make($request->password);
        $member->save();
        return response()->json('User created!');
    }

    public function getOneData(Request $req){
        $UserModel = new User();
        $id = $req->id;
        $data = $UserModel->getOneStudent($id);
        return response()->json($data);
    }

    public function updateData(Request $req){
        $json = array();
        $id = $req->id;
        $UserModel = new User();
        $result = $UserModel->updateStudent($id,$req->all());
        if($result){
            $json['code'] = 1;
            $json['userName']=$req->name;
            $json['message'] = 'Details updated successfully';
            return response()->json([
                'code' => 1,
                'message' => 'Update Successfully',
                'userName'=>$req->name,
            ]);
        }
        else{
            $json['code'] = 2;
            $json['message'] = 'Error while updating details';
        }
        return response()->json($json);
    }
}
