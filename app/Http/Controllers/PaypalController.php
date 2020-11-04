<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
   
class PaypalController extends Controller
{
    public function index(Request $request){
        $title = $request->input('title');
        $price = $request->input('price');

        return redirect('/offers/payment')->with(array('title' => $title, 'price' => $price));
    }
    
}

    
