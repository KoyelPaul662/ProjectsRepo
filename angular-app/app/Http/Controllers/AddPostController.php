<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Addpost;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
class AddPostController extends Controller
{
    public function addPost(Request $req)
    {
        //dd($req);
         $data =  $req->only('name', 'id', 'title', 'description');
         $file = $req->file("file");
         $uploadPath = "images/profile";
         if($file!=''){
            $originalName = $file->getClientOriginalName();
            $orgname=date('YmdHis').'img'.'_'.$originalName;
            $file->move( $uploadPath,$orgname);
         }
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'id' => 'required',
            'title' => 'required|string',
            'description' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'code' => 2 ], 200);
        }

        if($file!=''){
            $Addpost =  Addpost::create([
                'post_title'=> $req->title,
                'post_description'=> $req->description,
                'image' => $orgname,
                'author_id'=> $req->id,  
                'author_name'=> $req->name,  
            ]);
        }
        else{
            $Addpost =  Addpost::create([
                'post_title'=> $req->title,
                'post_description'=> $req->description,
                'author_id'=> $req->id,  
                'author_name'=> $req->name,  
            ]);
        }
        
        if($Addpost)
        {
        return response()->json([
            'success' => true,
            'code' => 1,
            'message' => 'Post created successfully',
            'data' => $Addpost
        ], Response::HTTP_OK);
        }
        else{
            return response()->json([
                'success' => false,
                'code' => 2,
                'message' => 'Kindly Fill up Crendential Properly',
                'data' => $Addpost
            ]);
        }
    }

    public function getAllPost(Request $req){
        $search = $req->search;
        $post= Addpost::orderBy('id','DESC')->get();
        if($search){
            $post=Addpost::where('author_name','=',$search)->get();
        }
        else{
            $post= Addpost::orderBy('id','DESC')->get();
        }
        $response = array(
            'data' => $post,
        );
        return response()->json($response);
    }

    public function getAllPosts(){
        $post= Addpost::orderBy('id','DESC')->get();
        $response = array(
            'data' => $post,
        );
        return response()->json($response);
    }

    public function getFeaturedPost(){
        $post= Addpost::orderBy('id','DESC')->limit(4)->get(); 
        $response = array(
            'data' => $post,
        );
        return response()->json($response);
    }

    public function getFooterPost(){
        $post= Addpost::orderBy('id','DESC')->limit(6)->get(); 
        $response = array(
            'data' => $post,
        );
        return response()->json($response);
    }

    // public function getUserPost(Request $req)
    // {
    //     $UserModel = new Addpost();
    //     $id = $req->id;
    //     $data = $UserModel->getUserPostData($id);
    //     $total=Addpost::count();
    //     // return response()->json($data); 
    //     return response()->json([
    //         'success' => true,
    //         'code' => 1,
    //         'message' => 'Post created successfully',
    //         'data' => $data,
    //         'total'=>$total
    //     ], Response::HTTP_OK);
    // }

    public function getUserPost(Request $request){
        $id = $request->id;
        $perPage = $request->input('per_page'); // Default per page to 10 if not provided
        $page = $request->input('page'); // Default to page 1 if not provided

        // Calculate the offset based on the page and perPage values
        $offset = ($page - 1) * $perPage;

        // Query to get paginated data
        $result = DB::table('posts')
            ->where('author_id', $id)
            ->orderBy('id', 'desc')
            ->offset($offset)
            ->limit($perPage)
            ->get();

        // Count of all records
        $totalCount = DB::table('posts')
            ->where('author_id', $id)
            ->count();

        // Prepare the response
        $response = [
            'data' => $result,
            'total' => $totalCount,
            'per_page' => $perPage,
            'current_page' => $page,
        ];
        return response()->json($response);
    }

    public function getEditPost(Request $req)
    {
        $UserModel = new Addpost();
        $id = $req->id;
        $data = $UserModel->getPostinfo($id);
        return response()->json($data); 
    }

    public function UpdatePost(Request $req){
        $id = $req->id;
        $post = Addpost::find($id);
        $post->post_title = $req->post_title;
        $post->post_description = $req->post_description;
        $file = $req->file("file");
        $uploadPath = "images/profile";
        if($file!=''){
            $originalName = $file->getClientOriginalName();
            $orgname=date('YmdHis').'img'.'_'.$originalName;
            $file->move( $uploadPath,$orgname);
            $post->image= $orgname;
         }
        $post->save();

        if($post)
        {
        return response()->json([
            'success' => true,
            'code' => 1,
            'message' => 'Post created successfully',
            'data' => $post
        ], Response::HTTP_OK);
        }
        else{
            return response()->json([
                'success' => false,
                'code' => 2,
                'message' => 'Kindly Fill up Crendential Properly',
                'data' => $post
            ]);
        }
    }

    public function getDeletePost(Request $req)
    {
        $id = $req->id;
        $post=Addpost::find($id);
        $post->delete();
        if($post)
        {
        return response()->json([
            'success' => true,
            'code' => 1,
            'message' => 'Deleted successfully',
            'data' => $post
        ], Response::HTTP_OK);
        }
        else{
            return response()->json([
                'success' => false,
                'code' => 2,
                'message' => 'Something went wrong',
                'data' => $post
            ]);
        }
    }

    public function getSearchPost(Request $req){
        $search = $req->search;
        $post=User::where('name','LIKE',"%$search%")->get();
        $userdetails=User::where('name','=',$search)->first();
        $usdet='';
        if($userdetails){
            $usdet=$userdetails;
        }     
        $response = array(
            'data' => $post,
            'user' => $usdet,
        );
        return response()->json($response);
    }

    public function getOneData(Request $req){
        $id = $req->id;
        $message= 1;
        $data = Addpost::where('author_id','=',$id)->get();
        $c = $data->count();
        if($c==0){
            $message=0;
        }
        $user=User::where('id','=',$id)->first();
        $response = array(
            'data' => $data,
            'user' => $user,
            'message'=>$message,
        );
        return response()->json($response);
    }
}  
