<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subscription extends Model{
    use HasFactory;
    protected $table="subscription";
    protected $primarykey="id";
    protected $guarded = [];
    protected $fillable=['amount'];
    public function getSubscriberinfo($id){
        $result =  DB::table('users')->where('id', $id)->get()->first();
        return $result;
     }
 
     
}
