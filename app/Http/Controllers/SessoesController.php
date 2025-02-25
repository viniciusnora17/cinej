<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;
use App\Models\Sessoes;

class SessoesController extends Controller
{
    public function create(){

        $sessoes = Filme::all();

        return view('/criar/sessoes', ['sessoes' => $sessoes]);
    }

    public function store(Request $request)
{

    $sessoes = new Sessoes;
    $sessoes->data = $request->data;
    $sessoes->filmes_id = $request->filmes_id;

    $sessoes->save();

    return redirect('/criar/filmes');

    
}
}
