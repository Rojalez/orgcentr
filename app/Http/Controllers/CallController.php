<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Call;
class CallController extends Controller
{
    public function index(Request $request) {
        $call = new Call;
        $call->name = $request->name;
        $call->phone = $request->phone;
        $call->save();

        return redirect()->back()->with('message', 'Заявка успешно принята!');

    }
}
