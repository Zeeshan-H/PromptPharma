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
    
    public function search(Request $request) {
        $cart = Session::get('cart');

        $search = $request->search;
        if($request->search != null) {

         //   $products = Product::with('images')->where('name', 'like', '%'.$request->search.'%')->get();

         $products = ProductImage::where('image_id', '=', 'id')->orWhereHas('products', 
         function($query) use($search) {
            $query->where('name', 'like', '%'.$search.'%');
         })->paginate(6);
          //  dd($products);
        }
        else {
            $products = ProductImage::with('products')->orderBy('image_id', 'desc')->paginate(6);      
        }
  
        return view('prompt.search.index', compact('products', 'cart'));
    }

}
