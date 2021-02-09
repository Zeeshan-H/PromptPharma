<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class DetailsController extends Controller
{
    public function index($name) {
        $cart = Session::get('cart');
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://pocketpharmaapi123.el.r.appspot.com/medicine/get-medicine-details?name='.$name);
        $response = collect(json_decode($request->getBody(), true));
        $products = $response["data"]["medicineList"];

        $total = [];
        if(isset($cart) && $cart->getContents()) {
            foreach($cart->getContents() as $slug => $product) {
            $total[] = $product['price'] * $product['quantity']; 
            }
    
        }
        else {
    
            $total[] = 0;
        }
        
        return view('prompt.details.details', compact('products', 'cart', 'total'));
    }
}