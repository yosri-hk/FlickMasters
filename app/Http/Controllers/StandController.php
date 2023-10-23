<?php

namespace App\Http\Controllers;
use App\Models\Stand;
use App\Models\Event;


use Illuminate\Http\Request;

class StandController extends Controller
{
    public function index()
    {
        $stands = Stand::all();
        return view('stands.index', compact('stands'));
    }

    public function create()
{
    $events = Event::all();
    return view('stands.create', compact('events'));
}
    
public function store(Request $request)
{
    $request->validate([
        'numero' => 'required',
        'emplacement' => 'required',
        'tarif_de_location' => 'required',
        'status' => 'required',
        'event_id' => 'required',
    ]);

    Stand::create($request->all());

    return redirect()->route('stands.index')
        ->with('success', 'Stand créé avec succès.');
}

    public function show($id)
    {
        $stand = Stand::findOrFail($id);
        return view('stands.show', compact('stand'));
    }

    public function edit($id)
    {
        $events = Event::all();
        $stand = Stand::findOrFail($id);
        return view('stands.edit', compact('stand','events'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'numero' => 'required',
            'emplacement' => 'required',
            'tarif_de_location' => 'required',
            'status' => 'required',
        ]);

        $stand = Stand::findOrFail($id);
        $stand->update($request->all());

        return redirect()->route('stands.index')
            ->with('success', 'Stand mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $stand = Stand::findOrFail($id);
        $stand->delete();

        return redirect()->route('stands.index')
            ->with('success', 'Stand supprimé avec succès.');
    }
}
