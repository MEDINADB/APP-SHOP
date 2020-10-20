<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //$productimages->product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    //creado campo calculado
    public function getUrlAttribute()
    {
       if(substr($this->images,0,4)=="http"){
        return $this->image;
       }
       return '/images/products/'.$this->image; 
    }
}
