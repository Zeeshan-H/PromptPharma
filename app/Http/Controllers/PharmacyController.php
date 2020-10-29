<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePharmacy;
use App\Models\Brand;
use App\Models\BrandImage;
use Session;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
//        $pharmacies = BrandImage::with('brands')->get();

$pharmacies = BrandImage::where('image_id', '=', 'id')->orWhereHas('brands', 
function($query) use($search) {
   $query->where('title', 'like', '%'.$search.'%');
})->paginate(6);

        return view('admin.pharmacies.index', compact('pharmacies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.pharmacies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePharmacy $request)
    {
//        dd($request->title);
if($request->has('thumbnail')) {
    $name = basename($request->thumbnail->getClientOriginalName());
    $name = $name;
    $path = $request->thumbnail->move('pharmaimages', $name, 'public');
    }

          $pharmacy = Brand::create([

            'title' => $request->title,
            'desc' => $request->desc,
            'map_link' => $request->maplink,
            'address' => $request->address,

          ]);

          $pharmaimage = BrandImage::create([

                'image_path' => $path,
                'brand_id' => $pharmacy->id,
          ]);

          Session::flash('success', 'Pharmacy has been successfully added!'); 

          return redirect()->route('admin.pharmacies.create', compact('pharmacy'));
         
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
    public function edit(Brand $pharmacy)
    {
        
        $pharmacies = Brand::where('id', '!=', $pharmacy->id)->get();

        return view('admin.pharmacies.create', ['pharmacies' => $pharmacies, 'pharmacy' => $pharmacy]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePharmacy $request, Brand $pharmacy)
    {
        if($request->has('thumbnail')) {
            $name = basename($request->thumbnail->getClientOriginalName());
            $name = $name;
            $path = $request->thumbnail->move('pharmaimages', $name, 'public');
            }

        $pharmacy->title = $request->title;

        $pharmacy->desc = $request->desc;

        $pharmacy->map_link = $request->maplink;

        $pharmacy->address = $request->address;


        $image = BrandImage::where('image_id', '=', $pharmacy->id)->first();
        // dd($image);
        $image->image_path = $path;
    
        $pharmacy->save();
        $image->save();

        Session::flash('success', 'Pharmacy has been successfully updated!');

        return redirect()->route('admin.pharmacies.create', compact('pharmacy'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandImage $pharmacy)
    {
        $pharmacy->delete();
  //      $pharmacy->delete();
        $pharma = Brand::where('id', '=', $pharmacy->brand_id);

      //  dd($pharma);

        $pharma->delete();

        Session::flash('success', 'Pharmacy has been successfully deleted!');
        return redirect()->route('admin.pharmacies.index', compact('pharmacy'));
    }
}
