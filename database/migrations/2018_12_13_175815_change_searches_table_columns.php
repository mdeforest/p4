<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSearchesTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('searches', function (Blueprint $table) {
            // Add columns
            $table->string('name');
            $table->decimal('frequency_value');
            $table->string('frequency_unit');

            $table->integer('platform_id')->unsigned();
            $table->foreign('platform_id')->references('id')->on('platforms');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // Drop columns
            $table->dropColumn('channel_name');
            $table->dropColumn('platform');
            $table->dropColumn('url');
            $table->dropColumn('followers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
