<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('province_id');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('birthday');
            $table->dropColumn('last_date_donation');
            $table->dropColumn('location_id');
            $table->dropColumn('blood_type_id');
            $table->string('username')->unique()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('province_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamp('birthday');
            $table->timestamp('last_date_donation')->nullable();
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('blood_type_id');
        });
    }
}
