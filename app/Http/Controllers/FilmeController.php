<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme; 

class FilmeController extends Controller
{

    
    public function create(){

        $filmes = Filme::all();

        $search = Request('search');
        
        if($search){
            
            $filmes = Filme::where(
                ['nome', 'like', '%'.$search.'%' ]
            )->get();

        }else{
            $filmes = Filme::all();
        }
     
        return view('/criar/filmes', ['filmes' => $filmes, 'search'=> $search]);
    }

    public function store(Request $request){
        

        $request->validate([
            'nome' => 'required', 
            'descricao' => 'required',
            'classificacao' => 'required',
            'image' => 'required'
        ]);

        
        $filme = Filme::create([
        'nome' => $request->nome,
        'descricao' => $request->descricao,
        'classificacao' => $request->classificacao
        ]);


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->file('image');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/filmes'), $imageName);

            $filme->image = $imageName;
            $filme->save();
        }   

      return response()->json([
        'success' => 'Filme cadastrado com sucesso!'
      ], 201);
       
    }
}
