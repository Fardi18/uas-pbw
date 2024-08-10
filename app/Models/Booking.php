<?php

namespace App\Models;

use App\Enums\BookingStatus;
use App\Enums\BookingType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bengkel_id',
        'tanggal_booking',
        'waktu_booking',
        'brand',
        'model',
        'plat',
        'tahun_pembuatan',
        'kilometer',
        'transmisi',
        'booking_status',
        'catatan_tambahan',
    ];

    public function detail_layanan_bookings()
    {
        return $this->hasMany(DetailLayananBooking::class);
    }

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanans()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
