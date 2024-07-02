<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    use HasFactory;
    protected $table = 'recharge';

    protected $fillable = ['type', 'amount' , 'user_id', 'admin_who_added', 'car_home_id'];

     
}
