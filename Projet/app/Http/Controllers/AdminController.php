<?php

namespace App\Http\Controllers;
use App\Models\Immobilier;
use App\Models\client;
use App\Models\Ventes;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::All();
        $immobiliers = Immobilier::All()->where('vendu','en attend');
        $NombreImmobiliers = Immobilier::count();

        $immobiliersVendu = Immobilier::All()->where('vendu' ,'vendu')->count(); 
        
        $listVendre= Ventes::with('ImmeubleVendre','client')->get();

        return view('admin.admin',compact('client','immobiliers','NombreImmobiliers',
                'immobiliersVendu','listVendre'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "immobilier_id" => 'required',
            "client_id" => 'required'
        ]);
        Ventes::create($request->all());
        Immobilier::where('id',$request->immobilier_id)->update(['vendu'=>'vendu']);
        return redirect('admin')->with('status', 'l\'immeuble est vendue');
    }

    public function destroy(int $id)
    {
        $Ventes=Ventes::findOrFail($id);
        $Ventes->delete();
        Immobilier::where('id',$Ventes->immobilier_id)->update(['vendu'=>'en attend']);
        return redirect('admin')->with('status', 'Document supprimer'); 
    }
}
