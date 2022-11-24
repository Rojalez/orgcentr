<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($id) {
        $product = Product::find($id);
            return view('frontend.pages.catalog.product', compact('product'));
    }

}
