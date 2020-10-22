<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $fillable = [
        'nama_jabatan', 'nilai_setiap_tugas', 'keterangan'
    ];
}
