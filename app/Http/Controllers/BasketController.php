<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Good;
use Auth;

class BasketController extends Controller
{

    public function index() 
    {
        return view('frontend.pages.catalog.basket');
    }

    public function toBasket($id, Request $request) 
    {

        $product = Product::find($id);

        if (!$request->session()->has('products')) //Проверка на наличие корзины в сессии. Если нет то создает и добавляет первый товар.
        { 
            $product->count = 1;
            $request->session()->put('products', [$product->id => $product]);
        } else if(array_key_exists($product->id,$request->session()->get('products'))) //Если в корзине уже есть товар, проверяет есть ли именно этот товар. Если нет то добавляет.
        {
            $products = $request->session()->pull('products');
            $products[$product->id]->count++;
            $request->session()->put('products', $products);
        } else  //Если уже есть товар. То просто прибавляет к количеству 1.
        {
            $product->count = 1;
            $products = $request->session()->pull('products');
            $products[$product->id] = $product;
            $request->session()->put('products', $products);
        }  
        return response()->json($request->session()->get('products')); 
    }

    public function fromBasket($id, Request $request) 
    {
        //Проверяет есть ли такой товар и останется ли после. Если да то количество минусуется 
        if($request->session()->has('products') && array_key_exists($id,$request->session()->get('products')) && $request->session()->get('products')[$id]->count > 1) 
        {
            $products = $request->session()->pull('products');
            $products[$id]->count--;
            $request->session()->put('products', $products);
        }

        return response()->json($request->session()->get('products'));
    }

    public function deleteBasket($id, Request $request) 
    {
        //Удаление товара из корзины
        if($request->session()->has('products') && array_key_exists($id,$request->session()->get('products'))) 
        {
            $products = $request->session()->pull('products');
            unset($products[$id]);
            $request->session()->put('products', $products);
        }
          
        return response()->json($request->session()->get('products'));
    }

    public function oformlenie(Request $request) {
        $order = new Order();
        if (Auth::check()){
            $order->user_id = Auth::id();
        }
        $order->fio = $request->fio;
        $order->platelshik = $request->platelshik;
        $order->gorod_dostavki = $request->gorod_dostavki;
        $order->vid_dostavki = $request->vid_dostavki;
        $order->vid_oplaty = $request->vid_oplaty;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->save();

        if(session()->has('products')) {
            foreach (session()->get('products') as $product) {
                $good = new Good();
                $good->order_id = $order->id;
                $good->art = $product->art;
                $good->category_id = $product->category_id;
                $good->maker_id = $product->maker_id;
                $good->brand = $product->brand;
                $good->name = $product->name;
                $good->price = $product->price;
                $good->description = $product->description;
                $good->image = $product->image;
                $good->nalichie = $product->nalichie;
                $good->save();
            }
        }
        
        session()->forget('products');

        return redirect('/')->with('message','Ваш заказ прият! Скоро с вами свяжется наш менеджер.');
    }
}
