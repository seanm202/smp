<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Image');
            $table->string('Address');
            $table->string('course');
            $table->integer('rollNumber');
            $table->integer('rgdNumber');
            $table->enum('status', ['Applied','Continue','Completed','Discontinued','Terminated'])->default('Applied');
            $table->integer('cPStatus');
            $table->integer('cMStatus');
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
        Schema::dropIfExists('students');
    }
}
