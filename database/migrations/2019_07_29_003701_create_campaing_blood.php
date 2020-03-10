<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaingBlood extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_type_campaign', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('blood_type_id');
            $table->unsignedBigInteger('campaign_id');
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
        Schema::dropIfExists('campaing_blood');
    }
}
