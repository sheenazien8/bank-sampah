<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTransactionIdToSavingHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saving_histories', function (Blueprint $table) {
            $table->foreignId('transaction_id')->nullable()->references('id')->on('transactions')->onDelete('CASCADE')->after('id');
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
            $table->dropForeign('transaction_id');
            $table->dropColumn('transaction_id');
        });
    }
}
