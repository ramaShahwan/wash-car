<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderService extends Model
{
    use HasFactory;

    protected $fillable = ['service_id','order_id'];
    
    public function services(): HasMany
    {
        return $this->hasMany(Service::class,'service_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class,'order_id');
    }
}
