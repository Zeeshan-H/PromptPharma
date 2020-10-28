<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $categories = Category::all();
        $pharmacies = Brand::all();
        $products = Product::all();
        return view('admin.dashboard.dashboard', compact('categories', 'pharmacies', 'products'));
    }
}
