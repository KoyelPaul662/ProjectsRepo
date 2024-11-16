<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specializations extends Model
{
    use HasFactory;
    protected $table="specialization";
    protected $primarykey="id";
    protected $fillable = ['title','created_at','updated_at'];
}
