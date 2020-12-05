<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_lengkap', 'nomor_ktp', 'alamat', 'saldo_akhir'
    ];

    /**
     * mengambil relasi ke table user
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
