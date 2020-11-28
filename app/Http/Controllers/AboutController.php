<?php

namespace App\Http\Controllers;
use App\Models\ProductImage;
use App\Models\BrandImage;
use App\Models\Product;
use App\Models\Cart;
use Session;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about() {

        $pharmacies = BrandImage::with('brands')->orderBy('image_id', 'desc')->take(6)->get();
        $cart = Session::get('cart');

        $total = [];
        if(isset($cart) && $cart->getContents()) {
            foreach($cart->getContents() as $slug => $product) {
            $total[] = $product['price'] * $product['quantity']; 
            }

        }
        else {

            $total[] = 0;
        }

        return view('prompt.about.index', compact('pharmacies', 'cart', 'total'));
    }
}
