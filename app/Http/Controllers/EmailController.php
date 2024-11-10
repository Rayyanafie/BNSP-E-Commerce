<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();

        Mail::send('email.send', compact('user', 'orders'), function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Payment Receipt');
        });

        return back()->with('success', 'Email sent successfully!');
    }
}
