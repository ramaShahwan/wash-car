<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeOrders extends Model
{
    use HasFactory;

    protected $table = 'home_orders';

    protected $fillable = ['typeOfHome','OrderTime', 'OrderDate', 'NumOfbulding', 'NumOfFloor', 'NumOfEmp',
                            'NumOfHour', 'cleanMaterial', 'totalPrice', 'note', 'statuss', 'location_id',
                            'user_id', 'employee_id', 'payWay_id'];


                            
}
