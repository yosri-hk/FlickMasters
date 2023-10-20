<?php

// app/Http/Controllers/StoreController.php
namespace App\Http\Controllers;
use App\Models\Store;
use App\Models\Promotion;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function index()
    {
        // Retrieve and display a list of stores
        $stores = Store::latest()->paginate(5);
        return view('stores.index', compact('stores'));
    }

    public function create()
    {
        // Display a form to create a new store
        return view('stores.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        Store::create($validatedData);
        return redirect('/stores');
    }

    public function show(Store $store)
    {
        // Display a specific store
        return view('stores.show', compact('store'));
    }

    public function edit(Store $store)
    {
        // Display a form to edit the store
        return view('stores.edit', compact('store'));
    }

    public function update(Request $request, Store $store)
    {
        // Validate and update the store in the database
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $store->update($validatedData);
        return redirect('/stores');
    }

    public function destroy(Store $store)
    {
        // Delete a store
        $store->delete(); 
        return redirect()->route('stores.index')->with('success','Store delete successfully');
    }

    
    public function attachPromotion(Request $request, Store $store)
    {
        $validatedData = $request->validate([
            'promotion_id' => 'required|exists:promotions,id',
        ]);
        $store->promotions()->attach($validatedData['promotion_id']);
        return redirect()->back();
    }

    public function detachPromotion(Store $store, Promotion $promotion)
    {
        $store->promotions()->detach($promotion->id);
        return redirect()->back();
    }

    public function listPromotion(Store $store)
    {
        $promotions = $store->promotions;
        // Display the list of coupons associated with the store
        return view('stores.promotions', compact('store', 'promotions'));
    }
    public function attachAndDetachPromotion(Store $store)
{
    $promotions = Promotion::all(); // Replace with how you retrieve your promotions

    return view('stores.attachanddetach', compact('store', 'promotions'));
}



}

