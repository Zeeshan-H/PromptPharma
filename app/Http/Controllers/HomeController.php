<?php

namespace App\Http\Controllers;
use App\Models\ProductImage;
use App\Models\BrandImage;
use App\Models\Product;
use App\Models\Cart;
use Session;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        //  $request->session()->forget('cart');
        $products = ProductImage::with('products')->orderBy('image_id', 'desc')->take(6)->get();
        $cart = Session::get('cart');

      //   dd($cart);
       // $cart = [$car];
      //  dd($cart);
        return view('prompt.home.index', compact('products', 'cart'));
    }




    //Cart Functions

    public function cart() {

        if(!Session::has('cart')) {
            return view('prompt.cart.index');
        }

        $cart = Session::get('cart');
//        dd($cart);
        return view('prompt.cart.index', compact('cart'));
    }

    public function addToCart(Product $product, ProductImage $image, Request $request) {
     //   $prod = Product::with('images')->get();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $qty = $request->qty ? $request->qty : 1;
        $cart = new Cart($oldCart);
        $cart->addProduct($product, $image, $qty);

        Session::put('cart', $cart);
        return back();
   //     dd($cart);
        // return back()->with('message', "Product $product->title has been successfully added to 
        // Cart");
    }

    public function removeProduct(Product $product) {

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeProduct($product);
        Session::put('cart', $cart);
     //   dd($cart);

        return redirect()->route('cart.all');

    }

    public function updateProduct(Product $product, Request $request) {

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateProduct($product, $request->qty);
        Session::put('cart', $cart);

        return back();

    }
}
