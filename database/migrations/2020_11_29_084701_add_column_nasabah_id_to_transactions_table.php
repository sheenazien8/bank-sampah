<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNasabahIdToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreignId('nasabah_id')->references('id')->on('nasabahs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('nasabah_id');
        });
    }
}
