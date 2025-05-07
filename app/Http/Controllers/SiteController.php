<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Categoria;
use illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SiteController extends Controller
{

    use AuthorizesRequests;

    public function index(){

        $produtos = Produtos::paginate(3);
        return view('site.home', compact('produtos'));
    }

    public function details($slug){
        
        
        $produto = Produtos::where('slug', $slug)->firstOrFail();

        if(Gate::allows('ver-produto', $produto)){
            return view('site.details', compact('produto'));
        }

        if(Gate::denies('ver-produto', $produto)){
            return redirect()->route('site.index');
        }
        //Gate::authorize('ver-produto', $produto);
        //$this->authorize('verProduto', $produto);
        return view('site.details', compact('produto'));
    }

    public function categoria($id){ 
        $categoria = Categoria::findOrFail($id);
        $produtos = Produtos::where('id_categoria', $id)->paginate(1);
        return view('site.categoria', compact('produtos', 'categoria'));
    }



}
