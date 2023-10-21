<?php

namespace App\Http\Controllers;
use App\Models\Adresse;
use Illuminate\Http\Request;

class AdressetController extends Controller
{
    public function index()
    {
        $adresss = Adresse::all();
        return view('Address.indexlist', ['adresss' => $adresss]);
    }
    public function create()
    {
        return view('Address.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "Deliveryaddresse" => "required|string|max:20",
            "City" => "required|string",
            "Postal_code" => "required|numeric|min:1000",
           
         ]);
    Adresse::create($request->all());
    return redirect()->route('Address.indexlist')->with('success', 'Address created successfully');
}
public function edit(Adresse $adresse)
{
return view('Address.edit', ['adresse' => $adresse]);
}
public function update(Request $request, Adresse $adresse)
{
    
    $request->validate([
        "Deliveryaddresse" => "required|string|max:20",
        "City" => "required|string",
        "Postal_code" => "required|numeric|min:1000",
       
     ]);
     $adresse->update($request->all());
    return redirect()->route('Address.indexlist')->with('success', 'Address updated successfully');

}
public function destroy(Adresse $adresse)
{$adresse->delete();
    return redirect()->route('Address.indexlist')->with('success', 'Address deleted successfully');
}
}
