<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Categoria;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produtos::paginate(5);
        $categorias = Categoria::all();
        return view('admin.produtos', compact('produtos', 'categorias'));
    }

    public function destroy($id){
        $produto=Produtos::find($id);
        $produto->delete();
        return redirect()->route('admin.produtos')->with('sucesso', 'produto removido com sucesso!');
    }

    public function store(Request $request){
        $produto = $request->all();
        if($request->imagem){
          $produto['imagem'] = $request->imagem->store('produtos');
        }
        $produto['slug'] = Str::slug($request->nome);
        $produto = Produtos::create($produto);
        return redirect()->route('admin.produtos')->with('sucesso', 'produto cadastrado com sucesso');
    }
}
