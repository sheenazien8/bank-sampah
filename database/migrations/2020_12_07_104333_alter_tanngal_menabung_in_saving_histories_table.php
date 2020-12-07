<?php

use App\Models\SavingHistory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTanngalMenabungInSavingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saving_histories', function (Blueprint $table) {
            $table->date('tanggal')->nullable()->after('type');
        });
        $savingHistory = SavingHistory::get();
        foreach ($savingHistory as $history) {
            $history->fill([
                'tanggal' => $history->tanggal_menabung
            ]);
            $history->save();
        }
        Schema::table('saving_histories', function (Blueprint $table) {
            $table->dropColumn('tanggal_menabung');
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
            //
        });
    }
}
