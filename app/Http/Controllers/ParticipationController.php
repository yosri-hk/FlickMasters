<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participation;
use App\Models\Event;

class ParticipationController extends Controller
{
    public function index()
    {
        $participations = Participation::all();
        return view('participations.index', compact('participations'));
    }

    public function create()
    {
        $events = Event::all();
        return view('participations.create', compact('events'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "nom_participant" => "required|string|between:5,20",
            "cin_participant" => "required|string|between:5,100",
            "adresse_email" => "required|email",
            "telephone" => "required|string",
            "event_id" => "required|numeric",  
        ]);
        //Participation::create($request->all());
        $participation=Participation::create($data);
        return redirect('/');

    }

    public function show($id)
    {
        $participation = Participation::findOrFail($id);
        return view('participations.show', compact('participation'));
    }

    public function edit($id)
    {
        $participation = Participation::findOrFail($id);
        $events = Event::all();
        return view('participations.edit', compact('participation', 'events'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_participant' => 'required',
            'cin_participant' => 'required|unique:participations,cin_participant,' . $id,
            'adresse_email' => 'required|email',
            'date_de_participation' => 'required|date',
            'event_id' => 'required',
        ]);

        $participation = Participation::findOrFail($id);
        $participation->update($request->all());

        return redirect()->route('participations.index')
            ->with('success', 'Participation mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $participation = Participation::findOrFail($id);
        $participation->delete();

        return redirect()->route('participations.index')
            ->with('success', 'Participation supprimée avec succès.');
    }
}
