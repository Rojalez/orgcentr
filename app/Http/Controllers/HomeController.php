<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index () {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        return view('frontend.pages.home', compact('user', 'orders'));
    }
}
