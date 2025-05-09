<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ButtonController extends Controller
{
    public function index()
    {
        return view('user');
    }
    
    public function buttonClicked(Request $request)
    {
        // Handle the button click event
        $message = $request->input('message');

        // Broadcast the event
        Log::info('Button clicked with message: ' . $message);
        event(new \App\Events\ButtonClickedEvent($message));

        return response()->json(['status' => 'success']);
    }

    public function reception()
    {
        return view('reception');
    }
}
