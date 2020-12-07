<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'nomor_rekening', 'phone', 'is_nasabah', 'telegram_account'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * mengambil relasi ke table saving, berguna untuk mengambil tabungannya
     *
     * @return BelongsTo
     */
    public function tabungan()
    {
        return $this->hasOne(Saving::class, 'user_id');
    }

    /**
     * mengambil relasi ke table nasabah, berguna sebagai profile nasabah
     *
     * @return BelongsTo
     */
    public function nasabahProfile()
    {
        return $this->hasOne(Nasabah::class, 'user_id');
    }

    /**
     * Who Am I accessor
     *
     * @return String
     */
    public function getWhoamiAttribute()
    {
        return $this->is_nasabah ? 'nasabah' : 'admin';
    }

    /**
     * Return Telegram user_id of the user
     *
     * @return mixed
     */
    public function routeNotificationForTelegram()
    {
        return $this->telegram_account;
    }

    /**
     * get user Nasabah
     *
     * @return void
     */
    public function scopeIsNasabah(Builder $query): Builder
    {
        return $query->where('is_nasabah', true);
    }

    /**
     * mengambil saving
     *
     * @return HasOne
     */
    public function getSaving()
    {
        return $this->hasOne(Saving::class, 'user_id');
    }


}
