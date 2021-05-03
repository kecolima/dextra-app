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

                <h1>Promoções</h1>
                <a class="btn btn-small btn-primary" href="/promocao/novo">Cadastrar</a>
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
                        $totalPromocoes = 0;
                    @endphp

                <table width="100%" class="table table-striped table-hover">
                    <thead class="thead-dark table-dark">
                        <tr>
                            <th>Promoção</th>
                            <th>Regra</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($promocoes as $promocoes)
                        <tr>
                            <td>{{$promocoes->nome}}</td>
                            <td>{{$promocoes->regra}}</td>
                            <td><a class="alert-link" style="color:#0000FF" href="{{ route('atualizar_promocao', ['id'=>$promocoes->id])}}" title="Atualizar Promocao {{ $promocoes->nome }}">Editar</a></td>
                            <td><a class="alert-link" style="color:#FF0000" href="{{ route('excluir_promocao', ['id'=>$promocoes->id])}}" title="Excluir Promocao {{ $promocoes->nome }}">Excluir</a></td>
                        </tr>
                        @php
                            $totalPromocoes++;
                        @endphp
                    @endforeach
                </table>
                <table>
                    <tr><th>Total de Promocoes: {{$totalPromocoes}}</th></tr>
                </table>
            </div>
        </div>
    </div>
@endsection

