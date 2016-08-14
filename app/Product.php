<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price','imageurl'];

    public function getPriceAttribute($price)
    {
      return number_format($price, 2);
    }
    //additional logic to be added for other currencies


}
