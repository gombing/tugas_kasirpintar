<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['code','name','stock','sell_price','buy_price'];
}
