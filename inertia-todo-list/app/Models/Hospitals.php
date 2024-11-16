<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitals extends Authenticatable
{
    use HasFactory;
    protected $table="hospital";
    protected $primarykey="id";
    protected $fillable = ['hospital_name', 'hospital_email', 'hospital_phone', 'hospital_address', 'role','created_at','updated_at'];
}
