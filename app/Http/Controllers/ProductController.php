<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Requests\StoreProduct;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        $search = $request->search;
//        dd($products);
      //   $products = ProductImage::where('')->with('products')->get();

      $products = ProductImage::where('image_id', '=', 'id')->orWhereHas('products', 
      function($query) use($search) {
         $query->where('name', 'like', '%'.$search.'%');
      })->paginate(6);
      return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $pharmacies = Brand::all();
        return view('admin.products.create', compact('categories', 'pharmacies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
    //    dd($request->all());
    if($request->has('thumbnail')) {
        $name = basename($request->thumbnail->getClientOriginalName());
        $name = $name;
        $path = $request->thumbnail->move('productimages/', $name, 'public');
        }

        $product = Product::create([

            'name' => $request->product_name,
            'price' => $request->price,
            'desc' => $request->desc,
            'quantity' => $request->qty,
            'discount' => $request->discount,
            'tax' => $request->tax,
            'category_id' => $request->category_id[0],
            'brand_id' => $request->select_pharmacy[0]
        ]);

        $image = ProductImage::create([
            'image_path' => $path,
            'product_id' => $product->id
        ]);

        Session::flash('success', 'New product has been successfully added!');

        return redirect()->route('admin.products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $pharmacies = Brand::all();
        $products = Product::where('id', '!=', $product->id)->get();
        return view('admin.products.create', ['products' => $products, 'product' => $product, 'categories' 
        => $categories, 'pharmacies' => $pharmacies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, Product $product)
    {
        if($request->has('thumbnail')) {
            $name = basename($request->thumbnail->getClientOriginalName());
            $name = $name;
            $path = $request->thumbnail->move('productimages/', $name, 'public');
            }

        $product->name = $request->product_name;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->quantity = $request->qty;
        $product->discount = $request->discount;
        $product->tax = $request->tax;
        $product->category_id = $request->category_id[0];
        $product->brand_id = $request->select_pharmacy[0];

        $image = ProductImage::where('image_id', '=', $product->id)->first();
        $image->image_path = $path;
  
        $product->save();
        $image->save();

        Session::flash('success', 'Product has been successfully updated!');

        return redirect()->route('admin.products.create', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $product)
    {
        $product->delete();

        $prod = Product::where('id', '=', $product->product_id);

        $prod->delete();

        Session::flash('success', 'Product has been successfully deleted!');
        return redirect()->route('admin.products.index', compact('product'));
    }
}
