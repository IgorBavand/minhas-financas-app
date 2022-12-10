@extends('templates.template')

@section('content')

<section class="hero-section" style="mt-0">

    <div>
        <h2 class="text-center">Relatório de {{$mes_convertido}} - {{$ano}}</h2>
    </div>

    <div class="text-center mt-3 informacoes">

        <ul style="list-style: none">
            <li class="p-ganhos">Ganhos totais:<?php echo ' R$ ' . number_format($ganhos, 2, ',', '.'); ?></li>
            <li class="p-despesas">Despesas totais:<?php echo ' R$ ' . number_format($despesas, 2, ',', '.'); ?></li>
            @if(($ganhos - $despesas) > 0)
            <li class="p-ganhos">Saldo total:<?php echo ' R$ ' . number_format($lucro, 2, ',', '.'); ?></li>
            @else
            <li class="p-despesas">Saldo total:<?php echo ' R$ ' . number_format($lucro, 2, ',', '.'); ?></li>
            @endif

        </ul>

    </div>

    <div class="container mt-3 border">

        <table class="table table-bordered">
            <div class="row d-flex justify-content-center p-3">
                <a href="/" id="show-or-hide" class="btn btn-primary mt-3">Voltar</a>
            </div>

            <thead>
              <tr>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th scope="col">Ano</th>
                <th scope="col">Mes</th>
                <th scope="col">Tipo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($registros as $r)
              <tr>
                <td>{{$r->descricao}}</td>
                <td><?php echo ' R$ ' . number_format($r->valor, 2, ',', '.') ?></td>
                <td>{{$r->ano}}</td>
                <td>{{$r->mes}}</td>
                <td>{{$r->tipo}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

    </div>

</section>

@endsection
