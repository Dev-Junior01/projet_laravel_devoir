<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Client::All();
        return view('admin.clients',compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" => 'required',
            "nni" => 'required|min:8|max:8',
            "tel" => 'required|min:8|max:8',
        ]);
        Client::create($request->all());
        return redirect('client')->with('status', 'Le client est ajouté');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        return view('admin.editClient',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, client $client)
    {
        $request->validate([
            "nom" => 'required',
            "nni" => 'required',
            "tel" => 'required|min:8|max:8',
        ]);
        $client->update($request->all());
        return redirect('client')->with('status', 'Les information de client est modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        $client->delete();
        return redirect('client')->with('status', 'Les information de client est supprimer');
    }
}
