<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Categoria;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    public function index(Request $request){
        //$search = request("search");

        //if($search){
        //    $produtos = Produtos::where("nome","LIKE","%".$search."%")->paginate(5); 
        //}
        //else{
        //    $produtos = Produtos::paginate(5);
        //}

        $search = $request->query('search');

        $produtos = Produtos::where('id_user', auth()->id()) // 🔒 Só produtos do usuário logado
          ->when($search, function($query) use ($search) {
                $query->where('nome', 'like', "%{$search}%");
            })
            ->paginate(5);
    
        $categorias = Categoria::all();



        $categorias = Categoria::all();
        return view('admin.produtos', compact('produtos', 'categorias', 'search'));            
    }

    public function destroy($id){
        $produto=Produtos::find($id);
        $produto->delete();
        return redirect()->route('admin.produtos')->with('sucesso', 'produto removido com sucesso!');
    }

    public function store(Request $request){
        $produto = $request->all();

        $validate= $request->validate([
            'nome' =>'required',
            'preco'=>'required',
            'id_categoria'=>'required'
        ]);
     
        if($request->file('imagem')){
            $file = $request->file('imagem');
            $fileName = date('dmYH').'_'.$file->getClientOriginalName(). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('img/products'), $fileName);
            $produto['imagem'] = $fileName;
        }


        $produto['slug'] = Str::slug($request->nome);
        $produto = Produtos::create($produto);
        return redirect()->route('admin.produtos')->with('sucesso', 'produto cadastrado com sucesso');
    }

    public function update(Request $request, $id){

        $name = $request->input("nome");
        $preco = $request->input("preco");
        $description = $request->input("descrição");
        $imagem = $request->input("imagem");

        $produto->nome =  $name;
        $produto->preco = $preco;
        $produto->descrição = $description;
        $produto->imagem = $imagem;
        $produto->save();


    }

}
