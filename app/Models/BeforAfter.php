<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeforAfter extends Model
{
    use HasFactory;

    protected $table = 'beforeAfters';

    protected $fillable = ['beforeImage', 'afterImage', 'order_id', 'home_orders_id', 'employee_id'];


    
}
