<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory;
    
    protected $fillable = ['area', 'parentId','street'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
