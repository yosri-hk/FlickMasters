<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        return view('cart.indexlist', ['carts' => $carts]);
    }

    public function create()
    {
        return view('cart.create');
    }


public function store(Request $request)
{
     $request->validate([
        "user_id" => "required|numeric|min:0",
        "items" => "required",
        "Delivery_address" =>"required",
        "discounts" => "required|numeric|min:0",
        "subtotal" => "required|numeric|min:0",
        "payment_method" => "required",
     ]);


// Create a new Cart instance

Cart::create($request->all());

// Redirect to index with success message
return redirect()->route('Cart.indexlist')->with('success', 'Cart created successfully');
}

// public function show(Cart $cart)
// {
// return view('Cart.show', compact('cart'));
// }

public function edit(Cart $cart)
{
return view('Cart.edit', ['cart' => $cart]);
}

public function update(Request $request, Cart $cart)
{
    $request->validate([
        "user_id" => "required|numeric|min:0",
        "items" => "required",
       "Delivery_address" =>"required",
        "discounts" => "required|numeric|min:0",
        "subtotal" => "required|numeric|min:0",
        "payment_method" => "required",
     ]);


// Update the cart with the new data
$cart->update($request->all());

// Redirect to index with success message
return redirect()->route('Cart.indexlist')->with('success', 'Cart updated successfully');
}

public function destroy(Cart $cart)
{
// Delete the cart
$cart->delete();

// Redirect to index with success message
return redirect()->route('Cart.indexlist')->with('success', 'Cart deleted successfully');
}
}