<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeServices extends Model
{
    use HasFactory;

    protected $table = 'home_services';

    protected $fillable = ['type','name','price','period','description'];

}
