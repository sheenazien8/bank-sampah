<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnJumlahUangToSavingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saving_histories', function (Blueprint $table) {
            $table->double('jumlah_uang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saving_histories', function (Blueprint $table) {
            $table->dropColumn('jumlah_uang');
        });
    }
}
