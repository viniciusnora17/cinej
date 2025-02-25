<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salas;

class SalasController extends Controller
{
    public function create(){

        $salas = Salas::all();
     
        return view('/criar/salas', ['salas' => $salas]);
    }

    public function store(Request $request){

        $salas = new Salas;
        $salas->numeroSala = $request->numeroSala;
        $salas->qnt_lugares = $request->qnt_lugares;      

        $salas->save();

        return redirect('/criar/salas');
    }
}
