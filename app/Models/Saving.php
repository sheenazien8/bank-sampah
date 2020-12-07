<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'saldo_akhir', 'user_id'
    ];

    /**
     * mengambil relasi ke table user yang sebagai nasabah
     *
     * @return BelongsTo
     */
    public function nasabahUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
