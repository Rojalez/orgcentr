<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repair;
class RepairController extends Controller
{
    public function index() {
        $repairs = Repair::first();
        return view('frontend.pages.repair', compact('repairs'));
    }
}
