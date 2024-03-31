<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['nameWebsite','linkWebsite','Keywords','Description','socialMidiaFacebook',
    'socialMidiaTelegram','socialMidiaInstagram','socialMidiaYoutube','insertQuick'];
   
}
