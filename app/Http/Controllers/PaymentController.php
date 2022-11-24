<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index() {
        $payments = Payment::all();
        return view('frontend.pages.help.payment', compact('payments'));

    }
}
