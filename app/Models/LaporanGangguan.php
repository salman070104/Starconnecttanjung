<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanGangguan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_wa',
        'jenis_gangguan',
        'deskripsi',
        'status',
    ];
}
