<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayWay extends Model
{
    use HasFactory;

    protected $fillable = ['way','accountNumber'];

}
