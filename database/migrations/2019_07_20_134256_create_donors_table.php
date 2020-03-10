<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorsTable extends Migration
{
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable(true);
            $table->timestamp('birthday');
            $table->enum('genre', ['Female', 'Male', 'Other']);
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('blood_type_id');
            $table->timestamp('last_date_donation')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donors');
    }
}
