<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salas;
use DataTables;

class SalasController extends Controller
{

    public function index(Request $request)
    {

        $salas = Salas::select('id', 'numeroSala', 'qnt_lugares')->get();

        if($request->ajax()){   
            return Datatables::of($salas)

            ->addColumn('acao', function($row){
                return '<a href="javascript:void(0)" data-toggle="modal" data-target="#exempleModal" class="btn-m btn btn btn-info editButton" data-id="'.$row->id.'">Editar</a>
                <a href="javascript:void(0)" class="btn-m btn btn btn-danger deleteButton" data-id="'.$row->id.'">Excluir</a>';
                
            })
            ->rawColumns(['acao'])
            ->make(true);
        }
    }

    public function create(){

        $salas = Salas::all();

        $search = Request('search');
        
        if($search){
            
            $salas = Salas::where(
                ['numeroSala', 'like', '%'.$search.'%' ]
            )->get();

        }else{
            $salas = Salas::all();
        }
     
        return view('/criar/salas', ['salas' => $salas, 'search'=> $search]);
    }

    public function store(Request $request){

        if($request->salas_id != null){
            $salas = Salas::find($request->salas_id);
            if(!$salas){
              abort(404);
            }
  
            $salas->update([
              'numeroSala' => $request->numeroSala,
              'qnt_lugares' => $request->qnt_lugares,
            ]);

          
          return response()->json([
            'success' => 'Filme editado com sucesso!'
          ], 201);
          
          
      }else{
              $request->validate([
                  'numeroSala' => 'required', 
                  'qnt_lugares' => 'required',
                 
              ]);
      
              $salas = Salas::create([
              'numeroSala' => $request->numeroSala,
              'qnt_lugares' => $request->qnt_lugares,
  
          ]);

    
        }

        return response()->json([
            'success' => 'Sala cadastrado com sucesso!'
          ], 201);
    }

    public function edit($id)
    {
    
        $salas = Salas::find($id);
        if(!$salas){
            abort(404);
        }

        return $salas;
    }

    
    public function destroy($id)
    {
        $salas = Salas::find($id);
        if(! $salas){
            abort(404);
        }
       $salas->delete();
       return response()->json([
            'success' => 'Sala excluido com sucesso!'
       ]);
    }
}
