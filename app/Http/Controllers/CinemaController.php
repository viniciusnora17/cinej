<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;


class CinemaController extends Controller
{
    public function index(){

        $search = Request('search');

        if($search){
            
            $filmes = Filme::where(
                ['nome', 'like', '%'.$search.'%' ]
            )->get();

        }else{
            $filmes = Filme::all();
        }

        return view('welcome');
        return redirect('/criar/filmes', ['search'=> $search]);
    }

   
}
