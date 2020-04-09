<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone')->unique();
            $table->string('password');
            $table->timestamp('phone_verified_at')->nullable();
            $table->tinyInteger('is_verified')->default(0);
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->unsignedBigInteger('center_id');
            $table->foreign('center_id')->references('id')->on('communities');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
