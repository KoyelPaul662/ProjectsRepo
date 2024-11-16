<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Register extends Authenticatable
{
    use HasFactory;
    protected $table="members";
    protected $primarykey="id";
}
