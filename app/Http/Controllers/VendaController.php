<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class VendaController extends Controller
{
    public function create(){
        $vendas = Venda::all();
        return view('vendas.criar', ['vendas' => $vendas]);
    }

    public function store(Request $request){
        Venda::create([
            'nome' => $request->nome,
            'id_departamento' => $request->departamento,
            'salarioBase' => $request->salarioBase,
        ]);
        return redirect()->route('ver_venda');
    }

    public function show(Request $request){

        return ('todos');
    }

    public function destroy($id){
        $venda = Venda::findOrFail($id);
        $venda->delete();
        return redirect()->route('ver_venda');
    }

    public function edit($id){
        $venda = Venda::findOrFail($id);
        return view('vendas.editar', ['venda' => $venda]);
    }

    public function update(Request $request){
        $venda = Venda::findOrFail($request->id);
        $venda->update([
            'nome' => $request->nome,
            'id_departamento' => $request->departamento,
            'salarioBase' => $request->salarioBase,
        ]);
        return redirect()->route('ver_venda');
    }
}
