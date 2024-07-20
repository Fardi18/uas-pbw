<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'layanan_id',
        'product_id',
        'qty',
        'layanan_price',
        'product_price',
    ];

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
