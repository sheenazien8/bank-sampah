<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tanggal_transaksi'
    ];

    /**
     * mengambil relasi ke table user yang bertugas sebagai kasir
     *
     * @return BelongsTo
     */
    public function kasir()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
