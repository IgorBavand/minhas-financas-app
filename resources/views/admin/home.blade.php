@extends('templates.template')


@section('content')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

<section class="hero-section" style="mt-0">

    <div>
        <h2 class="text-center">Minhas Finanças</h2>
    </div>

    <div class="informacoes">
        <ul style="list-style: none">
            <li class="p-ganhos">Ganhos totais:<?php echo ' R$ ' . number_format($ganhos_totais, 2, ',', '.'); ?></li>
            <li class="p-despesas">Despesas totais:<?php echo ' R$ ' . number_format($despesas_totais, 2, ',', '.'); ?></li>
            @if(($ganhos_totais - $despesas_totais) > 0)
            <li class="p-ganhos">Saldo total:<?php echo ' R$ ' . number_format($saldo_total, 2, ',', '.'); ?></li>
            @else
            <li class="p-despesas">Saldo total:<?php echo ' R$ ' . number_format($saldo_total, 2, ',', '.'); ?></li>
            @endif

        </ul>

    </div>

    <div class="add-registro">
        <button id="show-or-hide" class="btn mt-3">Adicionar Registro</button>
    </div>

    <div class="container mt-3 form-registro border">
        <h4 class="text-center">Novo Registro</h4>

        <form action="{{url('/gerar-registro')}}" method="POST">
        @csrf

            <div class="form-group">
              <label for="descricao">Descrição</label>
              <input type="text" name="descricao" class="form-control" id="descricao" aria-describedby="emailHelp" placeholder="Digite a descrição...">
              <small id="descricao" class="form-text text-muted">Descreva o motivo do ganho ou despesa</small>
            </div>

            <div class="form-group">
              <label for="valor">Valor</label>
              <input type="number" name="valor" class="form-control" id="valor" placeholder="Digite o valor...">
            </div>

            <div class="form-group">
                <label for="ano">Ano</label>
                <input type="number" name="ano" class="form-control" id="ano" placeholder="Digite o ano (Ex.: 2022)">
            </div>

            <div class="form-group">
                <label for="mes">Mês</label>
                <select class="form-control" id="mes" name="mes">
                  <option value="JAN">Janeiro</option>
                  <option value="FEV">Fevereiro</option>
                  <option value="MAR">Março</option>
                  <option value="ABR">Abril</option>
                  <option value="MAI">Maio</option>
                  <option value="JUN">Junho</option>
                  <option value="JUL">Julho</option>
                  <option value="AGO">Agosto</option>
                  <option value="SET">Setembro</option>
                  <option value="OUT">Outubro</option>
                  <option value="NOV">Novembro</option>
                  <option value="DEZ">Dezembro</option>

                </select>
              </div>

              <div class="form-group">
                <label for="tipo">Tipo de Registro</label>
                <select class="form-control" id="tipo" name="tipo">
                  <option value="GANHO">Ganho</option>
                  <option value="DESPESA">Despesa</option>

                </select>
              </div>

            <button type="submit" class="btn btn-success">Registrar</button>
          </form>
    </div>

    <div v-if>

    </div>

    <div class="container mt-5">

        @foreach ($historicos as $h)
        <?php

           switch ($h->mes){
                case 1:
                    $mes = 'Janeiro';
                    break;
                case 2:
                    $mes = 'Fevereiro';
                    break;
                case 3:
                    $mes = 'Março';
                    break;
                case 4:
                    $mes = 'Abril';
                    break;
                case 5:
                    $mes = 'Maio';
                    break;
                case 6:
                    $mes = 'Junho';
                    break;
                case 7:
                    $mes = 'Julho';
                    break;
                case 8:
                    $mes = 'Agosto';
                    break;
                case 9:
                    $mes = 'Setembro';
                    break;
                case 10:
                    $mes = 'Outubro';
                    break;
                case 11:
                    $mes = 'Novembro';
                    break;
                case 12:
                    $mes = 'Dezembro';
                    break;
           }

        ?>

        <div class="caixa-registros text-center mt-3">
            <a class="link-registros" href="registro/<?php echo $h->ano ?>/<?php echo $h->mes ?>">{{$h->ano}} - {{$mes}} -  <b style="color: blueviolet">{{$h->quantidade_registros}} Registros</b></a> <br>

        </div>

        @endforeach

    </div>

</section>

@endsection
