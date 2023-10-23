<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        // Retrieve and display a list of promotions
        $promotions = promotion::latest()->paginate(5);
        return view('promotions.index', compact('promotions'));
    }

    public function create()
    {
        // Display a form to create a new promotion
        return view('promotions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'code_percentage' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|date|end_date_after_start',
        ]);
    
        Promotion::create($validatedData);
        return redirect('/promotions');
    }    

    public function show(promotion $promotion)
    {
        // Display a specific promotion
        return view('promotions.show', compact('promotion'));
    }

    public function edit(promotion $promotion)
    {
        // Display a form to edit the promotion
        return view('promotions.edit', compact('promotion'));
    }

    public function update(Request $request, promotion $promotion)
    {
        // Validate and update the promotion in the database
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $promotion->update($validatedData);
        return redirect('/promotions');
    }

    public function destroy(promotion $promotion)
    {
        // Delete a promotion
        $promotion->delete(); 
        return redirect()->route('promotions.index')->with('success','promotion delete successfully');
    }
}
