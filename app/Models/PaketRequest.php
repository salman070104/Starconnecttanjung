<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelanggan_id',
        'paket_lama',
        'tagihan_lama',
        'paket_baru',
        'tagihan_baru',
        'status',
        'admin_note',
        'approved_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
