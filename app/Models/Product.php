<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'product';

    protected $fillable = [
        'name',
        'descriptions',
        'price',
        'price_taxes_included',
        'image',
        'user_id',
        'status',
        'start_date',
        'end_date',
    ];

}
