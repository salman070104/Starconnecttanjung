<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'nama',
        'username',
        'email',
        'password',
        'alamat',
        'no_hp',
        'paket',
        'tagihan',
        'status',
        'tanggal_bayar',
        'foto',
        'is_wa_notif_enabled',
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'is_wa_notif_enabled' => 'boolean',
    ];
}
