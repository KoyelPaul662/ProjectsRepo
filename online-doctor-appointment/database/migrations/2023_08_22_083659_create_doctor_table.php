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
        Schema::create('doctor', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('image');
            $table->enum('gender',['M','F']);
            $table->integer('age');
            $table->bigInteger('fees'); 
            $table->string('password');         
            $table->unsignedBigInteger('specialization_id')->nullable();
            $table->foreign('specialization_id')->references('id')->on('specialization')->nullOnDelete('cascade');
            $table->string('day');
            $table->string('time');   
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
        Schema::dropIfExists('doctor');
    }
};
