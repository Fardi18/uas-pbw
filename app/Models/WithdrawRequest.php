<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    use HasFactory;

    protected $fillable = ['bengkel_id', 'amount', 'status', 'image'];

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class);
    }
}
