<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->id();
            $table->integer('doctorid');  
            $table->string('doctorname');
            $table->string('doctorday');
            $table->string('doctortime');
            $table->string('doctorfees');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->enum('status',['P','A','R','C']);
            $table->enum('gender',['M','F']);
            $table->integer('age');      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
};
