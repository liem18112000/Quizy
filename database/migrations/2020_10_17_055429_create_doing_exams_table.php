<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoingExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doing_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId("exam_id");
            $table->foreignId("course_id");
            $table->foreignId("user_id");
            $table->foreignId("role_type_id");
            $table->unsignedSmallInteger("grade")->nullable();
            $table->dateTime("begin_time")->nullable()->nullable();


           

            $table->timestamps();

             #set primary key
            // $table->primary(["exams_id","courses_id","users_id","role_type_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doing_exams');
    }
}
