<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddProductModel extends Model
{
    public $table = 'products';

    protected $fillable = [

            'name',
            'description',
            'amount',
            'price',
            'image'

        ];
}
