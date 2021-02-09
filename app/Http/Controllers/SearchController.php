<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\BrandImage;
use App\Models\Product;
use App\Models\Cart;
use Session;

class SearchController extends Controller
{
    
    // public function search(Request $request) {
    //     $cart = Session::get('cart');

    //     $search = $request->search;
    //     if($request->search != null) {

    //      //   $products = Product::with('images')->where('name', 'like', '%'.$request->search.'%')->get();

    //      $products = ProductImage::where('image_id', '=', 'id')->orWhereHas('products', 
    //      function($query) use($search) {
    //         $query->where('name', 'like', '%'.$search.'%');
    //      })->paginate(6);
    //       //  dd($products);
    //     }
    //     else {
    //         $products = ProductImage::with('products')->orderBy('image_id', 'desc')->paginate(6);      
    //     }
  
    //     return view('prompt.search.index', compact('products', 'cart'));
    // }

    public function search(Request $request) {
        $cart = Session::get('cart');
        $search = $request->search;
        $client = new \GuzzleHttp\Client();
                  

        if($request->search != null && strlen($search) > 2) {
            $request2 = $client->get('https://pocketpharmaapi123.el.r.appspot.com/medicine/get-medicine-details?name='.$search);
            $response = collect(json_decode($request2->getBody(), true));
            $medicineList = $response["data"]["medicineList"];
       
         //   $products = Product::with('images')->where('name', 'like', '%'.$request->search.'%')->get();

         $products = $medicineList;
         
        //  $products = ProductImage::where('image_id', '=', 'id')->orWhereHas('products', 
        //  function($query) use($search) {
        //     $query->where('name', 'like', '%'.$search.'%');
        //  })->paginate(6);
          //  dd($products);
        }
        else {
            $request2 = $client->get('https://pocketpharmaapi123.el.r.appspot.com/medicine/get-medicine-details?name=AUG');
            $response = collect(json_decode($request2->getBody(), true));
            $medicineList = $response["data"]["medicineList"];
    
            // $products = ProductImage::with('products')->orderBy('image_id', 'desc')->paginate(6);      
            for($i=0; $i<6; $i++) {


                $products[$i] = $medicineList[$i];
           }

        }

        $total = [];
        if(isset($cart) && $cart->getContents()) {
            foreach($cart->getContents() as $slug => $product) {
            $total[] = $product['price'] * $product['quantity']; 
            }

        }
        else {

            $total[] = 0;
        }
  
        return view('prompt.search.index', compact('products', 'cart', 'total'));
    }

}
