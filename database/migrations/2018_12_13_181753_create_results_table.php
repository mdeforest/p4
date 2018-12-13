<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('channel_name');
            $table->string('url');
            $table->integer('followers');

            $table->integer('search_id')->unsigned();
            $table->foreign('search_id')->references('id')->on('searches');

            $table->integer('platform_id')->unsigned();
            $table->foreign('platform_id')->references('id')->on('platforms');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
