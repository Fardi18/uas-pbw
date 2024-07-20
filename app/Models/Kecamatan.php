<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function bengkels()
    {
        return $this->hasMany(Bengkel::class);
    }
}
