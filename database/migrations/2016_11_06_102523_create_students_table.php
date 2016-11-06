<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('birthday');
            $table->boolean('gender');
            $table->string('religion');
            $table->double('first_sem_cgpa');
            $table->string('admit_type');
            $table->integer('year_admitted');
            $table->string('term_admitted');
            $table->string('program');
            $table->string('scholarship');
            $table->integer('enrolled_units');
            $table->integer('year_enrolled');
            $table->string('semester_enrolled');
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
