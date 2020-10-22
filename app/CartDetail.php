<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class CartDetail extends Model
{
        // cartdatail    1 product
    public function product (){
        return  $this->belongsTo(Product::class);
    }

}
