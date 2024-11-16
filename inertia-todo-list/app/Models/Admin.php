<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table="admin";
    protected $primarykey="id";
    protected $fillable = ['name', 'email', 'role', 'pasword','created_at','updated_at'];
}
