<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::latest()->paginate(5);
        $current_page = request()->input('page');
        return view('coupons.index', compact('coupons', 'current_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Coupon::create($request->all());
        return redirect()->route('coupons.index')->with('success','coupon created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        return view('Coupons.show',compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        return view('Coupons.edit',compact('coupon'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $coupon->update($request->all());
       return redirect()->route('coupons.index')->with('success','coupon Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete(); 
       return redirect()->route('coupons.index')->with('success','coupon delete successfully');
    }
    


}
