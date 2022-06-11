<?php

namespace App\Http\Controllers;

use App\Notifications\TelegramMsg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TeleController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function toTelegram(Request $request)
    {
        Notification::send($request, new TelegramMsg());

        return redirect()->route('contact')->with("message", 'Send Telegram Finished Successfuly!');
    }
}
