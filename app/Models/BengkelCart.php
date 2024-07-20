<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BengkelCart extends Model
{
    use HasFactory;

    protected $fillable = [
        "bengkel_id",
        "product_id",
        "booking_id",
        'layanan_id',
        "user_id",
        "quantity",
        "price",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class);
    }
}
