<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleTimes extends Model
{
    use HasFactory;
    protected $table="schedule_time";
    protected $primarykey="id";
    protected $fillable = ['schedule_day_id','time','created_at','updated_at'];
}
