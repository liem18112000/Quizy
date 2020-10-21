<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("question_id");
            $table->foreignId("exam_id");
            $table->foreignId("answer_choice_id");
            $table->longText("description");
            $table->string('status')->default('1');
            $table->timestamps();

            //  #set primary key
            // $table->primary(["id","exams_id"]);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
