<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;    
use App\Models\Categoria;    
use App\Models\Produtos;    
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    
    
    public function index(){

        $usuarios = User::all()->count();
        
        //graficos 1 - usuarios
        $userData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total'),
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        //preparo de arrays
        foreach($userData as $user){
            $ano[] = $user->ano;
            $total[]= $user->total;
        }
        //formatar para a chart
        $userLabel="'comparativo de cadastro de usuários'";
        $userAno = implode(',', $ano);
        $userTotal= implode(',', $total);

        //grafico 2

        $catData = Categoria::with('produtos')->get();

        //preparar array
        foreach($catData as $cat){
            $catNome[]="'".$cat->nome."'";
            $catTotal[]= $cat->produtos->count();
        }

        //formatar
        $catLabel = implode(',', $catNome);
        $catTotal= implode(',', $catTotal);

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
