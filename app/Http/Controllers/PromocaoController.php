<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocao;

class PromocaoController extends Controller
{
    public function create(){
        //$departamentos = Departamento::all();
        return view('promocoes.criar');
    }

    public function store(Request $request){
        Promocao::create([
            'nome' => $request->nome,
            'regra' => $request->regra,
        ]);

        return redirect()->route('ver_promocao');
    }

    public function show(Request $request){
        $promocoes = Promocao::all();
        return view('promocoes.todos', ['promocoes' => $promocoes]);
    }

    public function destroy($id){
        $promocao = Promocao::findOrFail($id);
        $promocao->delete();
        return redirect()->route('ver_promocao');
    }

    public function edit($id){
        $promocao = Promocao::findOrFail($id);
        return view('promocoes.editar', ['promocao' => $promocao]);
    }

    public function update(Request $request){
        $promocao = Promocao::findOrFail($request->id);
        $promocao->update([
            'nome' => $request->nome,
            'regra' => $request->regra,
        ]);
        return redirect()->route('ver_promocao');
    }
}
