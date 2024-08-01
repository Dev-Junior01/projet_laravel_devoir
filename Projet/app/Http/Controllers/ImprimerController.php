<?php

namespace App\Http\Controllers;
use App\Models\Ventes;

use Illuminate\Http\Request;

class ImprimerController extends Controller
{



    public function index(int $id){
        $listVendre= Ventes::with('ImmeubleVendre','client')->get()->where('id',$id);
        return view('admin.imprimer',compact('listVendre'));
    }
}
