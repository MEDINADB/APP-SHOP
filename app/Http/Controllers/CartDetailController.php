<?php

namespace App\Http\Controllers;

use App\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    public function store (Request $request){
        

        $cardDetail = new CartDetail();
        $cardDetail->cart_id= auth()->user() ->cart->id;
        $cardDetail-> product_id = $request->product_id;
        $cardDetail-> quantity= $request->quantity;
        $cardDetail->save();

        return back();
    }
}
