<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Comments;

class Addpost extends Model
{
    use HasFactory;
    protected $table="posts";
    protected $primarykey="id";
    protected $fillable=['author_name','author_id','post_title','image','post_description'];

    public function getPostinfo($id){
        $result =  DB::table('posts')->where('id', $id)->get()->first();
        return $result;
     }

     public function getUserPostData($id){
        $result =  DB::table('posts')->where('author_id', $id)->get();
        return $result;
     }

     public function comments(){
         return $this->hasMany(Comments::class,'post_id','id');
     }
}
