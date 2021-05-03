@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
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

                <h1>Ingredientes</h1>
                <a class="btn btn-small btn-primary" href="/ingrediente/novo">Cadastrar</a>
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
                        $totalIngredientes = 0;
                    @endphp

                <table width="100%" class="table table-striped table-hover">
                    <thead class="thead-dark table-dark">
                        <tr>
                            <th>Ingrediente</th>
                            <th>Quantidade</th>
                            <th>Valor</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($ingredientes as $ingrediente)
                        <tr>
                            <td>{{$ingrediente->nome}}</td>
                            <td>{{$ingrediente->quantidade}}</td>
                            <td>{{$ingrediente->valor}}</td>
                            <td><a class="alert-link" style="color:#0000FF" href="{{ route('atualizar_ingrediente', ['id'=>$ingrediente->id])}}" title="Atualizar Ingrediente {{ $ingrediente->nome }}">Editar</a></td>
                            <td><a class="alert-link" style="color:#FF0000" href="{{ route('excluir_ingrediente', ['id'=>$ingrediente->id])}}" title="Excluir Ingrediente {{ $ingrediente->nome }}">Excluir</a></td>
                        </tr>
                        @php
                            $totalIngredientes++;
                        @endphp
                    @endforeach
                </table>
                <table>
                    <tr><th>Total de Ingredientes: {{$totalIngredientes}}</th></tr>
                </table>
            </div>
        </div>
    </div>
@endsection

