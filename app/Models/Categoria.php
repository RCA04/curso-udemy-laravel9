<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produtos;
class Categoria extends Model
{
    use HasFactory; 
    protected $fillable = [
        "name",
        "descricao",

    ];

    public function produtos()
    {
        //return $this->hasMany(Produtos::class, 'id');
        return $this->hasMany(Produtos::class, 'id_categoria', 'id');
        
        
    }

    
}
