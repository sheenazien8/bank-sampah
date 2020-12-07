<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'jumlah_uang', 'tanggal'
    ];

    /**
     * mengambil relasi ke table savings dan model ini bertugas sebagai detail saving
     *
     * @return BelongsTo
     */
    public function tabungan()
    {
        return $this->belongsTo(Saving::class, 'saving_id');
    }
}
