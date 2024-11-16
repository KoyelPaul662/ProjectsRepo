<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin= new Admin();
        $admin->name="admin";
        $admin->email="admin@gmail.com";
        $admin->role="admin";
        $admin->phone="1234567891";
        $admin->address="adminaddess";
        $admin->password=hash::make("12345");
        $admin->save();
    }
}
