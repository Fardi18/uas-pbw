<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'alamat',
        'pemilik_id',
        'kecamatan_id',
        'kelurahan_id',
        'link_alamat',
    ];

    public function layanans()
    {
        return $this->hasMany(Layanan::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function pemilik_bengkel()
    {
        return $this->belongsTo(PemilikBengkel::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
