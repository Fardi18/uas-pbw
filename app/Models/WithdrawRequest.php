<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'status'];

    public function pemilikBengkel()
    {
        return $this->belongsTo(PemilikBengkel::class);
    }
}
