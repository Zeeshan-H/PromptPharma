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

        
    //    $request->session()->forget('cart');
        $products = ProductImage::with('products')->orderBy('image_id', 'desc')->take(6)->get();
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
      //   dd($cart);
       // $cart = [$car];
      //  dd($cart);
        return view('prompt.home.index', compact('products', 'cart', 'total'));
    }


//         public function index() {   
//    //      $request->session()->forget('cart');
//          $cart = Session::get('cart');
           
//             $products = [];
//             $client = new \GuzzleHttp\Client();
//             $request = $client->get('https://pocketpharmaapi123.el.r.appspot.com/medicine/get-medicine-details?name=AUG');
//             $response = collect(json_decode($request->getBody(), true));
//             $medicineList = $response["data"]["medicineList"];
//             for($i=0; $i<6; $i++) {


//                  $products[$i] = $medicineList[$i];
//             }   

//              return view('prompt.home.index', compact('products', 'cart'));
//       //       dd($products);
//         }

    //Cart Functions

    public function cart() {

        if(!Session::has('cart')) {
            return view('prompt.cart.index');
        }

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
//        dd($cart);
        return view('prompt.cart.index', compact('cart', 'total'));
    }

    public function addToCart2(Product $product, ProductImage $image, Request $request) {
     //   $prod = Product::with('images')->get();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $qty = $request->qty ? $request->qty : 1;
        $cart = new Cart($oldCart);
        $cart->addProduct2($product, $image, $qty);

        Session::put('cart', $cart);
        return back();
   //     dd($cart);
        // return back()->with('message', "Product $product->title has been successfully added to 
        // Cart");
    }

public function addToCart($productname, $pharmaname, $productprice, $productquat, Request $request) {
    //   $prod = Product::with('images')->get();
       $oldCart = Session::has('cart') ? Session::get('cart') : null;
       $qty = $request->qty ? $request->qty : 1;
       $cart = new Cart($oldCart);
       $cart->addProduct($productname, $pharmaname, $productprice, $productquat, $qty);

       Session::put('cart', $cart);
     //  dd($cart);
       return back();
  //     dd($cart);
       // return back()->with('message', "Product $product->title has been successfully added to 
       // Cart");
   }
    // public function removeProduct(Product $product, Request $request) {

    //     $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //     $cart = new Cart($oldCart);
    //     $cart->removeProduct($product, $request);
    //     Session::put('cart', $cart);
    //  //   dd($cart);

    //     return redirect()->route('cart.all');

    // }
    public function removeProduct($product, Request $request) {

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeProduct($product, $request);
        Session::put('cart', $cart);
     //   dd($cart);
        return back();
        // return redirect()->route('cart.all');

    }
    public function updateProduct($product, $price, Request $request) {
     //   dd($request->qty);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
    
        if($request->qty == 0) {
            $quat = 1;
        }
        else {
            $quat = $request->qty;
        }
        $cart->updateProduct($product, $price, $quat);
        Session::put('cart', $cart);

        return back();

    }
}
