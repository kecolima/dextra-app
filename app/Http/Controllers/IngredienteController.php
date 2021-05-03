<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingrediente;

class IngredienteController extends Controller
{
    public function create(){
        //$departamentos = Departamento::all();
        return view('ingredientes.criar');
    }

    public function store(Request $request){
        Ingrediente::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'valor' => $request->valor,
        ]);

        return redirect()->route('ver_ingrediente');
    }

    public function show(Request $request){
        $ingredientes = Ingrediente::all();
        return view('ingredientes.todos', ['ingredientes' => $ingredientes]);
    }

    public function destroy($id){
        $ingrediente = Ingrediente::findOrFail($id);
        $ingrediente->delete();
        return redirect()->route('ver_ingrediente');
    }

    public function edit($id){
        $ingrediente = Ingrediente::findOrFail($id);
        return view('ingredientes.editar', ['ingrediente' => $ingrediente]);
    }

    public function update(Request $request){
        $ingrediente = Ingrediente::findOrFail($request->id);
        $ingrediente->update([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'valor' => $request->valor,
        ]);
        return redirect()->route('ver_ingrediente');
    }
}
