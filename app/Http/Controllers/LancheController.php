<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Lanche;
use App\Models\Ingrediente;
use App\Models\Promocao;

class LancheController extends Controller
{
    public function create(){
        $ingredientes = Ingrediente::all();
        $promocoes = Promocao::all();
        return view('lanches.criar',  ['ingredientes' => $ingredientes, 'promocoes' => $promocoes]);
    }

    public function store(Request $request){
        $ingredientes = '';
        foreach($request->ingrediente as $ingrediente){
            $ingredientes .= ','.$ingrediente;
        }
        $ingredientes = substr($ingredientes, 1);
        Lanche::create([
            'nome' => $request->nome,
            'id_promocao' => $request->promocao,
            'id_ingredientes' => $ingredientes,
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
        $lanche = Lanche::findOrFail($id);
        $ingredientes = Ingrediente::all();
        $promocoes = Promocao::all();

        return view('lanches.editar', ['lanche' => $lanche,'ingredientes' => $ingredientes,'promocoes' => $promocoes]);
    }

    public function update(Request $request){
        $ingredientes = '';
        foreach($request->ingrediente as $ingrediente){
            $ingredientes .= ','.$ingrediente;
        }
        $ingredientes = substr($ingredientes, 1);
        $lanches = Lanche::findOrFail($request->id);
        $lanches->update([
            'nome' => $request->nome,
            'id_promocao' => $request->promocao,
            'id_ingredientes' => $ingredientes,
            'valor' => $request->valor,
        ]);

        return redirect()->route('ver_lanche');
    }
}
