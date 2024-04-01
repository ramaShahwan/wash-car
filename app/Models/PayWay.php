<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PayWay extends Model
{
    use HasFactory;

    protected $fillable = ['way','accountNumber'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
