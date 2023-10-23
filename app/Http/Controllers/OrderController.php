<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Product;
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
    $productID = $request->input('product_id');
    $product = Product::find($productID);

    if (!$product) {
        // Handle the case where the product is not found
        return redirect()->back()->with('error', 'order already passed');
    }
    $quantity = $request->input('quantity');

    // Calculate the total price based on the product's price and the order's quantity
    
    $couponCode = $request->input('code'); // Get the coupon code from the request
    
    $orderData = [
        
        'product_id' => $productID,
        'quantity' =>$quantity,
        'order_date' => $request->input('order_date'),
        'delivery_address' => $request->input('delivery_address'),
        
    ];
    $totalPrice = $product->price * $quantity;

    
   
    
    if ($couponCode) {
        // Find the coupon with the provided code
        $coupon = Coupon::where('code', $couponCode)->first();

        if (!$coupon) {
            // Handle the case where the coupon code is invalid
            return redirect()->back()->with('error', 'Invalid coupon code. Please try again.');
        } else {
            // If a valid coupon was found, add the coupon_id to the order data
            $orderData['coupon_id'] = $coupon->id;
            $totalPrice =$totalPrice - $coupon->discount_amount;
        }
    }
    
    $orderData['total_price'] = $totalPrice;
    // Create the order with or without a coupon
    Order::create($orderData);

    return redirect()->route('orders.create')->with('success', 'Order created successfully');
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