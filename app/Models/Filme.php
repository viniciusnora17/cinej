<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $table = 'filmes';

    protected $fillable  = ['nome', 'descricao', 'classificacao', 'image'];
    
    public function sessoes() {
        return $this->belongsTo(Sessoes::class, 'filmes_id');
    }
}
