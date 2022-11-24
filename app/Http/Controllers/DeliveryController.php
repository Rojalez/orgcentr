<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;

class DeliveryController extends Controller
{
    public function index() {
        $deliveries = Delivery::all();
        return view('frontend.pages.help.delivery', compact('deliveries'));
    }
    
   
}
