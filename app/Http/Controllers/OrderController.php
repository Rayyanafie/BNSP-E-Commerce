<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latestOrderGroup = Order::where('user_id', Auth::id())->max('order_group');
        $orders = Order::where('user_id', Auth::id())
            ->where('order_group', $latestOrderGroup)
            ->with('product', 'user')
            ->get();
        $user = Auth::user(); // Get the authenticated user's data

        return view('order.index', compact('orders', 'user'));
    }

    public function downloadPDF()
    {
        $latestOrderGroup = Order::where('user_id', Auth::id())->max('order_group');
        $orders = Order::where('user_id', Auth::id())
            ->where('order_group', $latestOrderGroup)
            ->with('product', 'user')
            ->get();
        $user = Auth::user();
        $pdf = PDF::loadView('order.pdf', compact('user', 'orders'));
        return $pdf->download('order.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
