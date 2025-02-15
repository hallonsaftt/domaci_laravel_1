<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = 'contact'; //vezuje bazu

    protected $fillable = [ //polja koja se mogu modifikovati kreirati
        'email',
        'first_name',
        'last_name',
        'subject',
        'message',
    ];


}
