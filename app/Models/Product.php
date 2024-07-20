<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bengkel_id',
        'image',
        'description',
        'price',
        'stock'
    ];

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class);
    }
}
