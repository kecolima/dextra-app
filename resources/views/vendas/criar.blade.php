@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Venda') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('salvar_venda') }}">
                        @csrf

                        @foreach($lanches as $lanche)
                        {{$lanche->nome}}
                        <div class="form-group row">
                            <label for="item" class="col-md-4 col-form-label text-md-right">Quantidade</label>

                            <div class="col-md-6">
                                <input id="quantidade" type="text" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" value="{{ old('quantidade') }}" required autocomplete="quantidade" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="item" class="col-md-4 col-form-label text-md-right">{{ __('Adicionais') }}</label>

                            <div class="col-md-6">
                                @foreach($ingredientes as $ingrediente)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">{{$ingrediente->nome}}</label>
                                    </div>
                                @endforeach
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="promocao" class="col-md-4 col-form-label text-md-right">{{ __('Promoção') }}</label>
                            <div class="col-md-6">
                                <select required class="form-control" id="promocao" name="promocao">
                                    <option value="">Promoção</option>
                                    @foreach($promocoes as $promocao)
                                        <option value="{{$promocao->nome}}">{{$promocao->nome}}</option>
                                    @endforeach
                                </select>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <hr>
                    @endforeach

                        <div class="form-group row">
                            <label for="valor" class="col-md-4 col-form-label text-md-right">{{ __('Valor') }}</label>

                            <div class="col-md-6">
                                <input id="valor" type="text" class="form-control" name="valor" required autocomplete="valor">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

