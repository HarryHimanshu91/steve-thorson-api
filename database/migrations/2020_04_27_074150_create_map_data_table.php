<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('center_id');
            $table->foreign('center_id')->references('id')->on('communities');
            $table->text('category');
            $table->text('name');
            $table->text('eng_description');
            $table->text('eng_directions');
            $table->text('swa_description');
            $table->text('swa_directions');
            $table->text('phone_number');
            $table->text('url');
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('map_data');
    }
}
