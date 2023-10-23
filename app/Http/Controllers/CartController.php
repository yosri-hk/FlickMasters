<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Address;
use App\Models\Adresse;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
     public function index()
     {
         $carts = Cart::all();
         return view('Cart.indexlist', ['carts' => $carts]);
     }
     public function show() {
        $carts = Cart::all(); // Remplacez Cart::all() par votre requête pour obtenir les paniers
    
        $addresses = Adresse::all(); // Récupérez la liste des adresses depuis votre modèle Address
    
        return view('Cart.show', compact('carts', 'addresses'));
    }
    public function search(Request $request)
{
    $selectedAddressId = $request->input('adresss');

    // Récupérez la liste de toutes les adresses pour la liste déroulante.
    $addresses = Adresse::all(); // Remplacez 'Adresse' par le nom de votre modèle d'adresse

    $results = Cart::with('addresses')->whereHas('addresses', function ($query) use ($selectedAddressId) {
        $query->where('id', $selectedAddressId);
    })->get();

    return view('Cart.show', compact('results', 'addresses', 'selectedAddressId'));
}
    public function calculateSubtotalForOrders(array $orderIds)
    {
        $orders = Order::whereIn('id', $orderIds)->get();
    
        $subtotal = 0;
    
        foreach ($orders as $order) {
            $subtotal += $order->total_price;
        }
    
        return $subtotal;
    }
    public function create()
    {   
       

        return view('cart.create');
    }

    public function create1()
    {   
       

        return view('Cart.add');
    }

public function store(Request $request)
{
     $request->validate([
        "user_id" => "required|numeric|min:0",
        "orders" => "required",
        "Delivery_address" =>"required",
     
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
        "orders" => "required",
       "Delivery_address" =>"required",
       
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