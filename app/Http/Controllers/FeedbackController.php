<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index(Request $request) {

        $feedback = new Feedback;
        $feedback->name = $request->name;
        $feedback->phone = $request->phone;
        $feedback->text = $request->text;
        $feedback->save();

        return redirect()->back()->with('message', 'Заявка успешно принята!');

    }
}
