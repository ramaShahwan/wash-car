<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['typeOfCar', 'sizeOfCar','numOfCar', 'totalPrice','orderDate'
    , 'location_id','user_id', 'payWay_id'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class,'user_id');
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class,'location_id');
    }

    public function payWays(): HasMany
    {
        return $this->hasMany(PayWay::class,'payWay_id');
    }



}