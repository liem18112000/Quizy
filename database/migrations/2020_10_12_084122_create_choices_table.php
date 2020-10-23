<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId("exam_id");
            $table->foreignId("question_id");
            $table->string('isTrue')->default('false');
            $table->longText("description");
            $table->string('status')->default('1');
            $table->timestamps();

            //  #set primary key
            //  $table->primary(["id","questions_id","exams_id"]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('choices');

    }
}
