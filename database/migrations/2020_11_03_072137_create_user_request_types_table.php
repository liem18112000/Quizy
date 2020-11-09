<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\UserRequestType;

class CreateUserRequestTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_request_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('urgent_level')->default('1');
            $table->string('status')->default('1');
            $table->timestamps();
        });

        $types = [
            'Register course',
            'Reject course',
            'Upgrade account',
            'Other'
        ];

        foreach($types as $type) {
            UserRequestType::create([
                'name'      => $type,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_request_types');
    }
}
