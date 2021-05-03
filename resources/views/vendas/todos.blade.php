@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                    <strong>Erros:</strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h1>Lanches</h1>
                <a class="btn btn-small btn-primary" href="">Cadastrar</a>
                <hr>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                        <strong>Erros:</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @php
                        $totalLanches = 0;
                    @endphp

                <table width="100%" class="table table-striped table-hover">
                    <thead class="thead-dark table-dark">
                        <tr>
                            <th>Lanche</th>
                            <th>Ingredientes</th>
                            <th>Tipo de Promoção</th>
                            <th>Valor</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($lanches as $lanche)
                        <tr>
                            <td>{{$lanche->nome}}</td>
                            <td>{{$lanche->id_ingredientes}}</td>
                            <td>{{$lanche->id_promocao}}</td>
                            <td>{{$lanche->valor}}</td>
                            <td><a class="alert-link" style="color:#0000FF" href="{{ route('atualizar_lanche', ['id'=>$lanche->id])}}" title="Atualizar Lanche {{ $lanche->nome }}">Editar</a></td>
                            <td><a class="alert-link" style="color:#FF0000" href="{{ route('excluir_lanche', ['id'=>$lanche->id])}}" title="Excluir Lanche {{ $lanche->nome }}">Excluir</a></td>
                        </tr>
                        @php
                            $totalLanches++;
                        @endphp
                    @endforeach
                </table>
                <table>
                    <tr><th>Total de Lanches: {{$totalLanches}}</th></tr>
                </table>
            </div>
        </div>
    </div>
@endsection

