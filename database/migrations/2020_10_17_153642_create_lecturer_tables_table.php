<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturerTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar('lecturer_email_adress');
            $table->varchar('lecturer_password');
            $table->varchar('lecturer_verfication_code');
            $table->varchar('lecturer_password');

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
        Schema::dropIfExists('lecturer_tables');
    }
}
