<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Lanche;

class LancheController extends Controller
{
    public function create(){
        //$departamentos = Departamento::all();

        return view('lanches.criar');
    }

    public function store(Request $request){
        Lanche::create([
            'nome' => $request->nome,
            'id_promocao' => $request->promocao,
            'id_ingredientes' => $request->ingrediente,
            'valor' => $request->valor,
        ]);

        return redirect()->route('ver_lanche');
    }

    public function show(Request $request){
        $lanches = Lanche::all();
        $promocao = DB::table('lanches')
            ->join('promocaos', 'lanches.id_promocao', '=', 'lanches.id')
            ->select('promocaos.nome as nome_promocao', 'promocaos.id as id_promocao', 'lanches.id as Id')
            ->get();

        return view('lanches.todos', ['lanches' => $lanches,'promocoes' => $promocao]);
    }

    public function destroy($id){
        $lanches = Lanche::findOrFail($id);
        $lanches->delete();

        return redirect()->route('ver_lanche');
    }

    public function edit($id){
        $lanches = Lanche::findOrFail($id);
        return view('lanches.editar', ['lanche' => $lanche]);

    }

    public function update(Request $request){
        $lanches = Lanche::findOrFail($request->id);
        $lanches->update([
            'nome' => $request->nome,
            'id_promocao' => $request->promocao,
            'id_ingredientes' => $request->ingrediente,
            'valor' => $request->valor,
        ]);

        return redirect()->route('ver_lanche');
    }
}
