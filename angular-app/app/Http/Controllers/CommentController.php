<?php

namespace App\Http\Controllers;

use App\Models\Addpost;
use App\Models\Comments;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    public function addcomment(Request $request){
        $comments= new Comments();
        $comments->comments=$request->comments;
        $comments->name=$request->name;
        $comments->email=$request->email;
        $comments->address=$request->address;
        $comments->post_id=$request->post_id;
        $comments->save();
        if($comments){
            return response()->json([
                'success' => true,
                'code' => 1,
                'message' => 'Thanks For Your Feedback',
                'data' => $comments
            ], Response::HTTP_OK);
        }
        else{
            return response()->json([
                'success' => false,
                'code' => 2,
                'message' => 'Somthing Went Wrong',
                'data' => $comments
            ]);
        }
    }

    public function getComments(Request $req){
        $comment = new Comments();
        $id = $req->id;
        $data = $comment::where('post_id','=',$id)->get();
        return response()->json($data);
    }

    public function topComments(){
        $comments = Addpost::withCount('comments')->orderBy('comments_count','DESC')->paginate(3);

        return $comments;
    }
}
