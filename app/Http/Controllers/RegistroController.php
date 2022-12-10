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
            'mes' => $this->castMeses($req->mes),
            'tipo' => $this->castTiposRegistro($req->tipo)
        ]);

        return redirect()->route('home');
    
    }

    public function verRegistro($ano, $mes){
        
        $registros_filtrados = Registro::where('ano', $ano)->where('mes', $mes)->get();
        
        $ganhos = Registro::where('ano', $ano)->where('mes', $mes)->where('tipo', 'GANHO')->sum('valor');
        $despesas = Registro::where('ano', $ano)->where('mes', $mes)->where('tipo', 'DESPESA')->sum('valor');


        switch ($mes){
            case 1:
                $mes_convertido = 'Janeiro';
                break;
            case 2:
                $mes_convertido = 'Fevereiro';
                break;
            case 3:
                $mes_convertido = 'Março';
                break;
            case 4:
                $mes_convertido = 'Abril';
                break;
            case 5:
                $mes_convertido = 'Maio';
                break;
            case 6:
                $mes_convertido = 'Junho';
                break;
            case 7:
                $mes_convertido = 'Julho';
                break;
            case 8:
                $mes_convertido = 'Agosto';
                break;
            case 9:
                $mes_convertido = 'Setembro';
                break;
            case 10:
                $mes_convertido = 'Outubro';
                break;
            case 11:
                $mes_convertido = 'Novembro';
                break;
            case 12:
                $mes_convertido = 'Dezembro';
                break;
       }
        
        return view('admin.registros',[
            'registros' => $registros_filtrados,
            'ano' => $ano,
            'mes_convertido' => $mes_convertido,
            'ganhos' => $ganhos,
            'despesas' => $despesas,
            'lucro' => ($ganhos - $despesas)
        ]);
    }


    private function castMeses($mes){

        switch($mes){
            case 'JAN':
                return 1;
            case 'FEV':
                return 2;
            case 'MAR':
                return 3;
            case 'ABR':
                return 4;
            case 'MAI':
                return 5;
            case 'JUN':
                return 6;
            case 'JUL':
                return 7;
            case 'AGO':
                return 8;
            case 'SET':
                return 9;
            case 'OUT':
                return 10;
            case 'NOV':
                return 11;
            case 'DEZ':
                return 12;
        }
        
    }

    private function castTiposRegistro($tipo){

        switch($tipo) {
            case 'GANHO':
                return 'GANHO';

            case 'DESPESA':
                return 'DESPESA';
        }
        
    }

     
}
