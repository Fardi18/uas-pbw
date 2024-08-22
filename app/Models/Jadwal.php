<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'senin_buka',
        'senin_tutup',
        'selasa_buka',
        'selasa_tutup',
        'rabu_buka',
        'rabu_tutup',
        'kamis_buka',
        'kamis_tutup',
        'jumat_buka',
        'jumat_tutup',
        'sabtu_buka',
        'sabtu_tutup',
        'minggu_buka',
        'minggu_tutup',
        'bengkel_id'
    ];

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class);
    }
}
