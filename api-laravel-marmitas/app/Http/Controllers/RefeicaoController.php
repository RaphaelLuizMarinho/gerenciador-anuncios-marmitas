<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refeicao;

class RefeicaoController extends Controller
{
    public function index() {
        $refeicao = Refeicao::all();
        return response()->json( $refeicao, 200 );
    }

    public function store( Request $request ) {
        $refeicao = new Refeicao();
        $refeicao->nome = $request->nome;
        $refeicao->descricao = $request->descricao;
        $refeicao->quantidade = $request->quantidade;
        $refeicao->data_fabricacao = $request->data_fabricacao;
        $refeicao->data_validade = $request->data_validade;
        $refeicao->igredientes = $request->igredientes;
        $refeicao->local_retirada = $request->local_retirada;
        $refeicao->modo_armazenamento = $request->modo_armazenamento;
        $refeicao->save();
        return response()->json( [
            'message' => 'Refeicao cadastrada'
        ],201);
    }
    public function show( $id ) {
        $refeicao = Refeicao::find( $id );
        if(!empty($refeicao)){
            return response()->json($refeicao);
        }else{
            return response()->json([
                "message"=>"Refeicao nao encontrada"
            ],404);
        }
    }
    public function update(Request $request, $id){
        if(Refeicao::where('id',$id)->exists()){
            $refeicao = Refeicao::find($id);
            $refeicao->nome = is_null($request->nome) ? $refeicao->nome : $request->nome;
            $refeicao->descricao = is_null($request->descricao) ? $refeicao->descricao : $request->descricao;
            $refeicao->quantidade = is_null($request->quantidade) ? $refeicao->quantidade : $request->quantidade;
            $refeicao->data_fabricacao = is_null($request->data_fabricacao) ? $refeicao->data_fabricacao : $request->data_fabricacao;
            $refeicao->data_validade = is_null($request->data_validade) ? $refeicao->data_validade : $request->data_validade;
            $refeicao->igredientes = is_null($request->igredientes) ? $refeicao->igredientes : $request->igredientes;
            $refeicao->local_retirada = is_null($request->local_retirada) ? $refeicao->local_retirada : $request->local_retirada;
            $refeicao->modo_armazenamento = is_null($request->modo_armazenamento) ? $refeicao->modo_armazenamento : $request->modo_armazenamento;
            $refeicao->save();
            return response()->json([
                "message"=> "Refeicao editada"
        ],200);
        }else{
            return response()->json([
                "message"=> "Refeicao nao encontrada"
            ],404);
        }
    }
    public function destroy($id){
        if(Refeicao::where('id',$id)->exists()){
            $refeicao = Refeicao::find($id);
            $refeicao->delete();

            return response()->json([
                "message" => "refeicao excluida"
            ],202);
        }else{
            return response()->json([
                "message" =>  "refeicao nao encontrada"
            ],404);
        }

    }

}
