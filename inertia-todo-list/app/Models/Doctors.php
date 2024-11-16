<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specializations;

class Doctors extends Authenticatable
{
    use HasFactory;
    protected $table="doctor";
    protected $primarykey="id";
    protected $fillable = ['name', 'email', 'phone', 'address', 'image','age','fees','day','time','specialization_id','password','gender','created_at','updated_at'];

    public function specialization(){
        return $this->belongsTo(Specializations::class,'specialization_id','id');
    }
}
