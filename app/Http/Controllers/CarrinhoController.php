<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Joelwmale\Cart\Facades\Cart;
use App\Routes\web;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens = \Cart::getContent();
        return view('site.carrinho', compact('itens'));
    }

    public function adicionarCarrinho(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' =>    $request->name,
            'price' =>   $request->price,
            'quantity' =>    abs($request->quantity),
            'attributes'=> array(
                'image' => $request->image
            )


        ]);

        return redirect()->route('site.carrinho')->with('sucesso','Item adicionado ao seu carrinho');
    }

    public function removeCarrinho(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso','Item removido de seu carrinho');

    }

    public function atualizaCarrinho(Request $request){

        \Cart::update($request->id,[
            'quantity'=>[
                'relative'=> false,
                'value'=>abs($request->quantity)
            ],
        ]);
        return redirect()->route('site.carrinho')->with('sucesso','Item atualizado com Sucesso!!');

    }

    public function limpaCarrinho(){
        \Cart::clear();
        return redirect()->route('site.carrinho')->with('aviso','seu Carrinho está vazio!');
        
    }
}