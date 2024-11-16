<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleDays extends Model
{
    use HasFactory;
    protected $table="schedule_day";
    protected $primarykey="id";
    protected $fillable = ['day','created_at','updated_at'];
}
