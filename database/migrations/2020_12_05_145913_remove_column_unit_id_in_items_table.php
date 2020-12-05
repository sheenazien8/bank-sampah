<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnUnitIdInItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['unit_id']);
            $table->dropColumn('unit_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            //
        });
    }
}
