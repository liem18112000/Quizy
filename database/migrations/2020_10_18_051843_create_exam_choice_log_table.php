<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamChoiceLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_choice_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId("course_id");
            $table->foreignId("user_id");
            $table->foreignId("role_type_id");
            $table->foreignId("exam_id");
            $table->foreignId("question_id");
            $table->foreignId("choice_id");
            $table->string('status')->default('1');
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
        Schema::dropIfExists('exam_choice_log');
    }
}
