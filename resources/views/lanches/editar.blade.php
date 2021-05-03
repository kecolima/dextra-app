@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lanche') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('atualizar_lanche', ['id' => $lanche->id]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                         <label for="ingrediente" class="col-md-4 col-form-label text-md-right">{{ __('Ingredientes') }}</label>
                            <div class="col-md-6">
                                <select id="ingrediente" name="ingrediente[]" multiple data-mdb-placeholder="Example placeholder" class="form-control selectpicker" data-live-search="true" multiple>
                                    @foreach($ingredientes as $ingrediente)
                                        <option value="{{$ingrediente->nome}}">{{$ingrediente->nome}}</option>
                                    @endforeach
                                </select>
                                @error('ingrediente')
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
                                        <option value="{{$promocao->id}}">{{$promocao->nome}}</option>
                                    @endforeach
                                </select>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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

