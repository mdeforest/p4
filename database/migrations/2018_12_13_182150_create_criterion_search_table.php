<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriterionSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterion_search', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('value');

            $table->integer('search_id')->unsigned();
            $table->foreign('search_id')->references('id')->on('searches');

            $table->integer('criterion_id')->unsigned();
            $table->foreign('criterion_id')->references('id')->on('criteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criterion_search');
    }
}
