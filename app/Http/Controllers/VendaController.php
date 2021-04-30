<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function create(){
        $vendas = Venda::all();
        return view('vendas.create', ['vendas' => $vendas]);
    }

    public function store(Request $request){
        Cargo::create([
            'nome' => $request->nome,
            'id_departamento' => $request->departamento,
            'salarioBase' => $request->salarioBase,
        ]);
        return redirect()->route('ver_cargo');
    }

    public function show(Request $request){

        return ('todos');
    }

    public function destroy($id){
        $cargo = Cargo::findOrFail($id);
        $cargo->delete();
        return redirect()->route('ver_cargo');
    }

    public function edit($id){
        $cargo = Cargo::findOrFail($id);
        return view('cargos.editar', ['cargo' => $cargo]);
    }

    public function update(Request $request){
        $cargo = Cargo::findOrFail($request->id);
        $cargo->update([
            'nome' => $request->nome,
            'id_departamento' => $request->departamento,
            'salarioBase' => $request->salarioBase,
        ]);
        return redirect()->route('ver_cargo');
    }
}
