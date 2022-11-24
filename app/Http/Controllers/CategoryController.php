<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index ($slug, Request $request) {

        $category = Category::where('slug', $slug)->first();

        $nalichie = $request->nalichie;
        $brand = $request->brands;
        $priceFilter = $request->priceFilter;
        $price_from = 0;
        $price_to = 200000;

        $products = Product::query();

        $products = $products->where('category_id', $category->id);

        if ($request->my_range != null) {
            $price = explode(';',$request->my_range);
            $price_from = $price[0];
            $price_to = $price[1];
            $products = $products->where('price', '>=', $price[0])->where('price', '<=', $price[1]);
        }

        if ($nalichie != null && $nalichie == 'on') {
            $products = $products->where('nalichie',  1);
        }

        if ($brand != null && count($brand) != 0) {
            $products = $products->whereIn('brand', $brand);
        }

        if ($priceFilter != null) {
            $products = $products->orderBy('price', $priceFilter);
        }

        $products = $products->paginate(20);

        $brands = DB::table('products')->select('brand')->groupBy('brand')->get();

        return view('frontend.pages.catalog.category', compact(
            'category',
            'products',
            'brands',

            'nalichie',
            'brand',
            'priceFilter',
            'price_from',
            'price_to'
        ));
    }
}
