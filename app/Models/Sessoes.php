<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessoes extends Model
{
    use HasFactory;

    protected $table = 'sessoes';
    
    public function filme() {
        return $this->hasMany(Filme::class, 'filmes_id');
    }
}
