<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest()->paginate(5);

// Get the current page number
$current_page = request()->input('page');

return view('orders.index', compact('orders', 'current_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Order::create($request->all());
       return redirect()->route('orders.index')->with('success','order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('Orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('Orders.edit',compact('order'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
       return redirect()->route('orders.index')->with('success','order Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
       $order->delete(); 
       return redirect()->route('orders.index')->with('success','order delete successfully');
    }
}
