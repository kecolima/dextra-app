<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lanche;

class LancheController extends Controller
{
    public function create(){
        //$departamentos = Departamento::all();
        return view('lanches.criar');
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
        $lanches = Lanche::all();
        return view('lanches.todos', ['lanches' => $lanches]);
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
