<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class TestController extends Controller
{
   public function  welcome()
   {
    
       return view('welcome');
   }
}
