<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Marks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

          Schema::create('marks', function (Blueprint $table) {
              $table->id();
              $table->string('subjectName');
              $table->string('subjectId');
              $table->integer('totaMark')->nullable()->change();
              $table->integer('securedMark')->nullable()->change();
              $table->integer('studentId')->nullable()->change();
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
      Schema::dropIfExists('marks');
    }
}
