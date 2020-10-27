<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Brand;
use App\Models\BrandImage;
use App\Models\Product;
use App\Models\Cart;
use Session;
class AllProductController extends Controller
{

    public function allproducts() {

        // dd($category);

        // dd($id);

      //  dd($id);
        $cart = Session::get('cart');

         $products = ProductImage::with('products')->orderBy('image_id', 'desc')->paginate(8);
         $categories = Category::all();

         $pharmacies = Brand::all();


        return view('prompt.products.index', compact('cart', 'categories', 'pharmacies', 'products'));
    }

    public function products($id) {

        // dd($category);

        // dd($id);

      //  dd($id);
        $cart = Session::get('cart');

 //        $products = ProductImage::with('products')->orderBy('image_id', 'desc')->paginate(8);
        $products = ProductImage::where('image_id', '=', 'id')->orWhereHas('products', 
        function($query) use($id) {
           $query->where('category_id', '=', $id);
        })->paginate(6);
        $categories = Category::all();

        $pharmacies = Brand::all();


        return view('prompt.products.index', compact('cart', 'categories', 'pharmacies', 'products'));
    }

    public function productsbrand($id) {

        $cart = Session::get('cart');

        //        $products = ProductImage::with('products')->orderBy('image_id', 'desc')->paginate(8);
               $products1 = ProductImage::where('image_id', '=', 'id')
               ->orWhereHas('products', 
               function($query) use($id) {
                $query->where('brand_id', '=', $id);
               })
               ->paginate(6);

               $products = Product::where('id', '=', 'id')
               ->orWhereHas('brands', 
               function($query) use($id) {
                $query->where('brand_id', '=', 'brand_id');
               })
               ->paginate(6);

            //   dd($products2);
        
               $categories = Category::all();
       
               $pharmacies = Brand::all();

               foreach($products1 as $product1) {
                $products->add($product1);
            }
               return view('prompt.products.index', compact('cart', 'categories', 'pharmacies', 'products'));

    }

    public function productspricerange(Request $request) {

        $cart = Session::get('cart');
        $low = $request->priceLow;
        $high = $request->priceHigh;

        // $products = ProductImage::with('products')->where('price', '>', $request->priceLow)->paginate(6);
        $products = ProductImage::where('image_id', '=', 'id')
        ->orWhereHas('products', 
        function($query) use($low, $high) {
           $query->where('price', '>=', $low);
           $query->where('price', '<=', $high);
        })
        ->paginate(6);


        $categories = Category::all();
       
        $pharmacies = Brand::all();

        return view('prompt.products.index', compact('cart', 'categories', 'pharmacies', 'products'));
    }
}
