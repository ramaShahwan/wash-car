<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_Order_Services extends Model
{
    use HasFactory;

    protected $table = 'home_order_services';

    protected $fillable = ['home_services_id','home_orders_id'];



}
