<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function kasir(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * mengambil relasi ke nasabah
     *
     * @return BelongsTo
     */
    public function nasabah(): BelongsTo
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id');
    }

    /**
     * Mengambil relasi ke detail transaksi
     *
     * @return HasMany
     */
    public function detailTransaksi(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }


}
