<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Produtos;


class ProdutoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function verProduto(User $user, Produtos $produto){
        return $user->id === $produto->id_user;
    }
}
