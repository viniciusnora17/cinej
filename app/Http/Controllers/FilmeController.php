<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme; 
use DataTables;

class FilmeController extends Controller
{

    public function index(Request $request)
    {

        $filmes = Filme::select('id', 'nome')->get();

        if($request->ajax()){   
            return Datatables::of($filmes)

            ->addColumn('acao', function($row){
                return '<a href="javascript:void(0)" data-toggle="modal" data-target="#exempleModal" class="btn-m btn btn btn-info editButton" data-id="'.$row->id.'">Editar</a>
                <a href="javascript:void(0)" class="btn-m btn btn btn-danger deleteButton" data-id="'.$row->id.'">Excluir</a>';
                
            })
            ->rawColumns(['acao'])
            ->make(true);
        }
    }

    
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


        if($request->filme_id != null){
          $filme = Filme::find($request->filme_id);
          if(!$filme){
            abort(404);
          }

          $filme->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'classificacao' => $request->classificacao,
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
          'success' => 'Filme editado com sucesso!'
        ], 201);
        
        
    }else{
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

    }
    
    
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

    public function edit($id)
    {
    
        $filmes = Filme::find($id);
        if(! $filmes){
            abort(404);
        }

        return $filmes;
    }

    public function destroy($id)
    {
        $filmes = Filme::find($id);
        if(! $filmes){
            abort(404);
        }
       $filmes->delete();
       return response()->json([
            'success' => 'Filme excluido com sucesso!'
       ]);
    }
}
