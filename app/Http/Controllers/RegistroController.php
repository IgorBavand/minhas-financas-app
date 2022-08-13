<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Registro;
use App\Models\Historico;

class RegistroController extends Controller
{
    
    public function home(){

        $ganhos_totais = Registro::where('tipo', 'GANHO')->sum('valor');
        $despesas_totais = Registro::where('tipo', 'DESPESA')->sum('valor');

        $saldo_total = $ganhos_totais - $despesas_totais;

        $historicos = Historico::all();

        return view('admin.home', [
            'ganhos_totais' => $ganhos_totais,
            'despesas_totais' => $despesas_totais,
            'saldo_total' => $saldo_total,
            'historicos' => $historicos
        ]); 
    }

    public function novoRegistro(Request $req){


        Registro::create([
            'valor' => $req->valor,
            'descricao' => $req->descricao,
            'ano' => $req->ano,
            'mes' => $req->mes,
            'tipo' => $req->tipo
        ]);

        return Registro::all();
    
    }

    public function verRegistro($ano, $mes){
        return $ano;
    }
     
}
