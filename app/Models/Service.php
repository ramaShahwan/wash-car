<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Service extends Model
{
    use HasFactory;

    protected $fillable = ['type','name','price','period','description'];

    public function order_service(): BelongsTo
    {
        return $this->belongsTo(Order_Service::class);
    }
}
