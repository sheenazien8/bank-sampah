<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_pics', function (Blueprint $table) {
            $table->id();
            $table->string('pin')->unique();
            $table->foreignId('today_pic_id')->references('id')->on('today_pics')->onDelete('CASCADE');
            $table->dateTime('logged_in_at')->nullable();
            $table->dateTime('logged_out_at')->nullable();
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
        Schema::dropIfExists('history_pics');
    }
}
