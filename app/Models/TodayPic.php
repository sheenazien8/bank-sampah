<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodayPic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tanggal_tugas', 'user_id', 'pic_id', 'pin'
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

    /**
     * mengambil relasi ke table pic
     *
     * @return BelongsTo
     */
    public function pic()
    {
        return $this->belongsTo(Pic::class, 'pic_id');
    }
}
