<?php

namespace App\Http\Controllers;
use App\Models\Adresse;
use App\Models\Cart;
use Illuminate\Http\Request;

class AdressetController extends Controller
{
     public function index()
     {
         $adresss = Adresse::all();
        return view('Address.indexlist', ['adresss' => $adresss]);
     }
    // public function showCarts() {
    //     $carts = Cart::all(); // Remplacez Cart::all() par votre requête pour obtenir les paniers
    
    //     $adresss = Adresse::all(); // Récupérez la liste des adresses depuis votre modèle Address
    
    //     return view('Cart.show', compact('carts', 'adresss'));
    // }
    

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
public function edit(Adresse $adresss)
{
return view('Address.edit', ['adresse' => $adresss]);
}
public function update(Request $request, Adresse $adresss)
{
    
    $request->validate([
        "Deliveryaddresse" => "required|string|max:20",
        "City" => "required|string",
        "Postal_code" => "required|numeric|min:1000",
       
     ]);
     $adresss->update($request->all());
    return redirect()->route('Address.indexlist')->with('success', 'Address updated successfully');

}
public function destroy(Adresse $adresss)
{$adresss->delete();
    return redirect()->route('Address.indexlist')->with('success', 'Address deleted successfully');
}
// public function search(Request $request)
// {
//     $selectedAddressId = $request->input('address');

//     // Récupérez la liste de toutes les adresses pour la liste déroulante.
//     $adresss = Adresse::all(); // Remplacez Adresse par le nom de votre modèle d'adresse

//     // Si une adresse est sélectionnée, effectuez la recherche en fonction de son ID.
//     if (!empty($selectedAddressId)) {
//         $results = Adresse::where('id', $selectedAddressId)->get();
//     } else {
//         // Sinon, renvoyez tous les résultats.
//         $results = Adresse::all();
//     }

//     return view('Cart.show', compact('results', 'adresss', 'selectedAddressId'));
// }


}
