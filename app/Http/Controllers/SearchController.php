<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Search;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function ajax(Request $request) {
        $products = Product::where('name', 'LIKE', '%'.$request->title.'%')
                    ->orWhere('description', 'LIKE', '%'.$request->title.'%')
                    ->orWhere('art', 'LIKE', '%'.$request->title.'%')
                    ->orWhere('brand', 'LIKE', '%'.$request->title.'%')
                    ->with('category')
                    ->take(4)
                    ->get();
        
        $searches = Search::where('title', 'LIKE', '%'.$request->title.'%')
                    ->orderBy('count', 'desc')
                    ->take(10)
                    ->get();

        return response()->json([
            'products' => $products,
            'searches' => $searches
        ]);
        
    }

    public function search (Request $request) {

        $title = $request->title;
        $category = $request->category;
        $nalichie = $request->nalichie;
        $brand = $request->brands;
        $priceFilter = $request->priceFilter;
        $price_from = 0;
        $price_to = 200000;

        $categories = Category::all();
        $products = Product::query();
        $products->where(function ($q) use ($title) {
            $q->where('name', 'LIKE', '%'.$title.'%')
            ->orWhere('description', 'LIKE', '%'.$title.'%')
            ->orWhere('art', 'LIKE', '%'.$title.'%')
            ->orWhere('brand', 'LIKE', '%'.$title.'%');
        });

        if ($request->my_range != null) {
            $price = explode(';',$request->my_range);
            $price_from = $price[0];
            $price_to = $price[1];
            $products->where('price', '>=', $price[0])->where('price', '<=', $price[1]);
        }

        if ($category != null) {
            $products->where('category_id', $category);
        }

        if ($nalichie != null && $nalichie == 'on') {
            $products->where('nalichie',  1);
        }

        if ($brand != null && count($brand) != 0) {
            $products->whereIn('brand', $brand);
        }

        if ($priceFilter != null) {
            $products->orderBy('price', $priceFilter);
        }

        $products = $products->paginate(20);

        //dd($products);

        $brands = DB::table('products')->select('brand')->groupBy('brand')->get();

        return view('frontend.pages.catalog.result', compact(
            'categories',
            'products',
            'brands',

            'title',
            'category',
            'nalichie',
            'brand',
            'priceFilter',
            'price_from',
            'price_to'
        ));
    }
    
}
