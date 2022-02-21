<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ShopCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $categories = ShopCategory::all();
        $products = Products::with('category')->get();

        return view('template', compact('categories', 'products'));
    }
}
