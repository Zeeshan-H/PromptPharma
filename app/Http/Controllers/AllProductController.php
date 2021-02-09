<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Brand;
use App\Models\BrandImage;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Collection;


use Session;
class AllProductController extends Controller
{

    
    public function allproducts(Request $request) {
         
         $cart = Session::get('cart');
         $products = ProductImage::with('products')->orderBy('image_id', 'desc')->take(8)->get();  
         $categories = Category::all();
         $pharmacies = Brand::all();
         $total = [];
         if(isset($cart) && $cart->getContents()) {
             foreach($cart->getContents() as $slug => $product) {
             $total[] = $product['price'] * $product['quantity']; 
             }
 
         }
         else {
 
             $total[] = 0;
         }
        return view('prompt.products.index', compact('cart', 'products', 'categories', 'pharmacies', 'total'));
    }

    public function livesearch(Request $request) {
   
        $cart = Session::get('cart');
        $search = $request->get('search');
        // $prod = array();
       
        // $pro = $request->get('prod');

        // $collection = collect($pro);
        // $p=Product::where('name', 'like', '%'.$search.'%')
        // ->leftjoin('product_images','product_images.product_id','products.id')
        // ->get();
        // dd($p);

            $products = ProductImage::with('products')->whereHas('products',
                function($q) use ($search){
                    $q->where('name', 'like', '%'.$search.'%');
                }
            )->orderBy('image_id', 'desc')->get();      
     
        //  $products = ProductImage::with('products')->whereHas('products', function($q) use ($search)
        //  {
        //      $q->where('name', 'like', '%'.$search.'%');
     
        //  })->get();
        $categories = Category::all();
        $pharmacies = Brand::all();
        $total = [];
        if(isset($cart) && $cart->getContents()) {
            foreach($cart->getContents() as $slug => $product) {
            $total[] = $product['price'] * $product['quantity']; 
            }

        }
        else {

            $total[] = 0;
        }
        // dd($products);
        return response()->json($products);
    }

    
    // public function allproducts(Request $request) {
    
    //     // dd($category);

    //     // dd($id);
    //     $low = $request->priceLow;
    //     $high = $request->priceHigh;
    //   //  dd($id);
    //    $search = $request->search;
    //     $cart = Session::get('cart');
    //     $products = [];
    //     // $categories = [];
    //     $pharmacies = [];
    //     $pharm = [];
    //     $counter = 1;
    //     // $med = [];
    //     $client = new \GuzzleHttp\Client();

    //     // $pharmacies = Brand::all();
    //     if($request->search != null) {
    //         $request2 = $client->get('https://pocketpharmaapi123.el.r.appspot.com/medicine/get-medicine-details?name='.$search);
    //         $response = collect(json_decode($request2->getBody(), true));
    //         $medicineList = $response["data"]["medicineList"];
    //         foreach($response["data"]["medicineList"] as $item) {

    //            $pharm[$counter] = $item['pharmacyList'];
    //            if(is_array($pharm[$counter]) || is_object($pharm[$counter])) {
    //            foreach($pharm[$counter] as $pharmacy) {

    //                 $pharmacies[$counter] = $pharmacy['name'];
    //            }
    //            $counter ++;
    //         }
                
    //         }  
       
    //         for($i=0; $i<count($medicineList); $i++) {


    //         $products[$i] = $medicineList[$i];
    //    }
    //     //  $products = ProductImage::with('products')->orderBy('image_id', 'desc')->paginate(8);
      
    //     for ($x=0; $x<count($medicineList); $x++) {
    //         $categories[$x] = $medicineList[$x];
    //     }
       
    //     if($low!=null || $high!=null) {
        
    //         foreach($products as $po) {
    
    
    //                 $products = array_filter($products, function($po) use ($low, $high) {
    //                     foreach($po['pharmacyList'] as $pw) {
    //                     return $pw['price'] >= $low && $pw['price'] <= $high;
    //                     }
    //                 });           
    
    
    //                 // dd($pw['price']);
    
    //             }
    //         }
    // }

    // else {
    //     $search = 'AUG';
    //     $request2 = $client->get('https://pocketpharmaapi123.el.r.appspot.com/medicine/get-medicine-details?name=AUG');
    //     $response = collect(json_decode($request2->getBody(), true));
    //     $medicineList = $response["data"]["medicineList"];


    //     foreach($response["data"]["medicineList"] as $item) {

    //         $pharm[$counter] = $item['pharmacyList'];
    //         if (is_array($pharm[$counter]) || is_object($pharm[$counter]))
    //         {
    //         foreach($pharm[$counter] as $pharmacy) {

    //              $pharmacies[$counter] = $pharmacy['name'];
    //         }
    //         $counter ++;

    //     }
    // }  
        
    //     // $products = ProductImage::with('products')->orderBy('image_id', 'desc')->paginate(6);      
    //     for($i=0; $i<8; $i++) {


    //         $products[$i] = $medicineList[$i];
    //    }
    //    for($k=0; $k<count($medicineList); $k++) {
    //     $categories[$k] = $medicineList[$k];
    //     }


    //     if($low!=null || $high!=null) {
        
    //         foreach($products as $po) {
    
    
    //                 $products = array_filter($products, function($po) use ($low, $high) {
    //                     foreach($po['pharmacyList'] as $pw) {
    //                     return $pw['price'] >= $low && $pw['price'] <= $high;
    //                     }
    //                 });           
    
    
    //                 // dd($pw['price']);
    
    //             }
            
    //         // dd('Filtered');
    
    //     }
    // }
    // $total = [];
    // if(isset($cart) && $cart->getContents()) {
    //     foreach($cart->getContents() as $slug => $product) {
    //     $total[] = $product['price'] * $product['quantity']; 
    //     }

    // }
    // else {

    //     $total[] = 0;
    // }

    //     return view('prompt.products.index', compact('cart', 'categories', 'pharmacies', 'products', 'search', 'total'));
    // }


    public function productbycat(Request $request, $cat, $search) {
    
        // dd($category);
      //  dd($cat);

        // dd($id);


        $low = $request->priceLow;
        $high = $request->priceHigh;
      //  dd($id);
    //    $search = $request->search;
        $cart = Session::get('cart');
        $products = [];
        // $categories = [];
        $pharmacies = [];
        $pharm = [];
        $counter = 1;
        // $med = [];
        $client = new \GuzzleHttp\Client();

        // $pharmacies = Brand::all();
        if($request->search != null) {
                  
            $request2 = $client->get('https://pocketpharmaapi123.el.r.appspot.com/medicine/get-medicine-details?name='.$search);
            $response = collect(json_decode($request2->getBody(), true));
            $medicineList = $response["data"]["medicineList"];
            foreach($response["data"]["medicineList"] as $item) {

               $pharm[$counter] = $item['pharmacyList'];

               if (is_array($pharm[$counter]) || is_object($pharm[$counter]))
               {
               foreach($pharm[$counter] as $pharmacy) {
   
                    $pharmacies[$counter] = $pharmacy['name'];
               }
               $counter ++;
   
           }
                
            }  
       
            for($i=0; $i<count($medicineList); $i++) {


            $products[$i] = $medicineList[$i];
       }
        //  $products = ProductImage::with('products')->orderBy('image_id', 'desc')->paginate(8);
      
        for ($x=0; $x<count($medicineList); $x++) {
            $categories[$x] = $medicineList[$x];
        }




        if($low!=null || $high!=null) {
        
            foreach($products as $po) {
    
    
                    $products = array_filter($products, function($po) use ($low, $high) {
                        foreach($po['pharmacyList'] as $pw) {
                        return $pw['price'] >= $low && $pw['price'] <= $high;
                        }
                    });           
    
    
                    // dd($pw['price']);
    
                }
            
            // dd('Filtered');
    
        }
        
            


      

        
    }

    else {
        $request2 = $client->get('https://pocketpharmaapi123.el.r.appspot.com/medicine/get-medicine-details?name=AUG');
        $response = collect(json_decode($request2->getBody(), true));
        $medicineList = $response["data"]["medicineList"];


        foreach($response["data"]["medicineList"] as $item) {

            $pharm[$counter] = $item['pharmacyList'];

            foreach($pharm[$counter] as $pharmacy) {

                 $pharmacies[$counter] = $pharmacy['name'];
            }
            $counter ++;

             
         }  
        
        // $products = ProductImage::with('products')->orderBy('image_id', 'desc')->paginate(6);      
        for($i=0; $i<8; $i++) {


            $products[$i] = $medicineList[$i];
       }
       for($k=0; $k<count($medicineList); $k++) {
        $categories[$k] = $medicineList[$k];
        }

//            dd($cat);



  

        if($low!=null || $high!=null) {
        
            foreach($products as $po) {
    
    
                    $products = array_filter($products, function($po) use ($low, $high) {
                        foreach($po['pharmacyList'] as $pw) {
                        return $pw['price'] >= $low && $pw['price'] <= $high;
                        }
                    });           
    
    
                    // dd($pw['price']);
    
                }
            
            // dd('Filtered');
    
        }

    }
   
    if($cat!=null) {

        foreach($products as $po) {
    
    
            $products = array_filter($products, function($po) use ($cat) {
                return $po['type'] === $cat;
                
            });           
            // dd($products);
    
            // dd($pw['price']);
    
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


        return view('prompt.products.filter', compact('cart', 'categories', 'pharmacies', 'products', 'search', 'total'));
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
        })->get();
        $categories = Category::all();

        $pharmacies = Brand::all();
        $total = [];
        if(isset($cart) && $cart->getContents()) {
            foreach($cart->getContents() as $slug => $product) {
            $total[] = $product['price'] * $product['quantity']; 
            }

        }
        else {

            $total[] = 0;
        }



        return view('prompt.products.index', compact('cart', 'categories', 'pharmacies', 'products', 'total'));
    }

    public function productsbrand($id) {

        $cart = Session::get('cart');
        

        //        $products = ProductImage::with('products')->orderBy('image_id', 'desc')->paginate(8);
               $products1 = ProductImage::where('image_id', '=', 'id')
               ->orWhereHas('products', 
               function($query) use($id) {
                $query->where('brand_id', '=', $id);
               })
               ->take(8)->get();

               $products = Product::where('id', '=', 'id')
               ->orWhereHas('brands', 
               function($query) use($id) {
                $query->where('brand_id', '=', 'brand_id');
               })
               ->take(8)->get();

            //   dd($products2);
        
               $categories = Category::all();
       
               $pharmacies = Brand::all();

               foreach($products1 as $product1) {
                $products->add($product1);
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


               return view('prompt.products.index', compact('cart', 'categories', 'pharmacies', 'products', 'total'));

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

        $total = [];
        if(isset($cart) && $cart->getContents()) {
            foreach($cart->getContents() as $slug => $product) {
            $total[] = $product['price'] * $product['quantity']; 
            }

        }
        else {

            $total[] = 0;
        }

        return view('prompt.products.index', compact('cart', 'categories', 'pharmacies', 'products', 'total'));
    }

    // public function productspricerange(Request $request, $product) {
    //     dd($request);
    //     $prod = [];
    //     $cat = [];


   

    //     //   print_r(Session::get('cat'));
    //     // $categories = [];
    //     // $pharmacies = [];
    //      $cart = Session::get('cart');
    //     // $low = $request->priceLow;
    //     // $high = $request->priceHigh;

    //     // // $products = ProductImage::with('products')->where('price', '>', $request->priceLow)->paginate(6);
    //     // // $products = ProductImage::where('image_id', '=', 'id')
    //     // // ->orWhereHas('products', 
    //     // // function($query) use($low, $high) {
    //     // //    $query->where('price', '>=', $low);
    //     // //    $query->where('price', '<=', $high);
    //     // // })
    //     // // ->paginate(6);
    //         $products = $produc;

    //      $categories = Session::get('cat');
       
    //      $pharmacies = Session::get('pharma');

    //     return view('prompt.products.index', compact('cart', 'categories', 'pharmacies', 'products'));
    // }
}
