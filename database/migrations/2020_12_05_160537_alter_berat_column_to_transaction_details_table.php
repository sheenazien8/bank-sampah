<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBeratColumnToTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropColumn('berat');
            $table->double('jumlah');
            $table->double('profit_bank_sampah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropColumn('jumlah');
            $table->dropColumn('profit_bank_sampah');
            $table->double('berat');
        });
    }
}
