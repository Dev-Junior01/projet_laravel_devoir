<?php

namespace App\Http\Controllers;

use App\Models\Immobilier;
use Illuminate\Http\Request;

class ImmobilierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Immobilier::All();
        return view('admin.immobiliers',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "titre" => 'required|min:3',
            "description" => 'required|min:3',
            "surface" => 'required|min:2',
            "salle" => 'required|min:1',
            "etage" => 'required|min:1',
            "prix" => 'required|min:5',
        ]);
        $immobilier = Immobilier::create($request->all());
        return redirect('immobilier')->with('status', 'L\'immobilier est ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(Immobilier $immobilier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Immobilier $immobilier)
    {
        $item = $immobilier;
        return view('admin.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Immobilier $immobilier)
    {
        $request->validate([
            "titre" => 'required|min:3',
            "description" => 'required|min:3',
            "surface" => 'required|min:2',
            "salle" => 'required|min:1',
            "etage" => 'required|min:1',
            "prix" => 'required|min:5',
        ]);
        $immobilier->update($request->all());
        return redirect('immobilier')->with('status', 'L\'immobilier est modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Immobilier $immobilier)
    {
        $immobilier->delete();
        return redirect('immobilier')->with('status', 'L\'immobilier est supprimer');
    }
}
