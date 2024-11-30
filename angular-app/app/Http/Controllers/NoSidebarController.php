<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addpost;

class NoSidebarController extends Controller
{
    public function getSubscriberData(Request $req){
        $UserModel = new Addpost();
        $id = $req->id;
        $data = $UserModel->getPostinfo($id);
        return response()->json($data);
    }
}
