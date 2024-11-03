<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order; // Add this line
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function buy(Request $request)
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Add the item to the cart
        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->product_id = $request->input('product_id');
        $cart->quantity = 1; // Default quantity to 1, you can modify as needed
        $cart->save();

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }
    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);

        // Ensure the item belongs to the logged-in user
        if ($cartItem->user_id !== Auth::id()) {
            return redirect()->route('cart.index')->with('error', 'Unauthorized action.');
        }

        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    public function checkout()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        $orderGroupId = time() . rand(10, 99);
        // Create a new order for each cart item
        foreach ($cartItems as $cartItem) {
            $order = new Order();
            $order->user_id = $user->id;
            $order->product_id = $cartItem->product_id;
            $order->quantity = $cartItem->quantity;
            $order->price = $cartItem->product->price;
            $order->subtotal = $cartItem->product->price * $cartItem->quantity;
            $order->order_group = $orderGroupId; // Assign the order group ID
            $order->save();
        }

        // Clear the cart after checkout
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('orders.index')->with('success', 'Checkout completed successfully.');
    }

}
