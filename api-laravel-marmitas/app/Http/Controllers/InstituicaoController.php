<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Instituicao;

class InstituicaoController extends Controller {
    public function index() {
        $instituicao = Instituicao::all();
        return response()->json( $instituicao, 200 );
    }

    public function store( Request $request ) {
        $instituicao = new Instituicao();
        $instituicao->cnpj = $request->cnpj;
        $instituicao->nome = $request->nome;
        $instituicao->email = $request->email;
        $instituicao->senha = bcrypt($request->senha);
        $instituicao->telefone = $request->telefone;
        $instituicao->cep = $request->cep;
        $instituicao->logradouro = $request->logradouro;
        $instituicao->complemento = $request->complemento;
        $instituicao->bairro = $request->bairro;
        $instituicao->cidade = $request->cidade;
        $instituicao->uf = $request->uf;
        $instituicao->crn_responsavel = $request->crn_responsavel;
        $instituicao->status_recebimento = $request->status_recebimento;
        $instituicao->save();
        return response()->json( [
            'message' => 'Instituicao cadastrada'
        ],201);
    }

    public function show( $id ) {
        $instituicao = Instituicao::find( $id );
        if(!empty($instituicao)){
            return response()->json($instituicao);
        }else{
            return response()->json([
                "message"=>"Instituicao nao encontrada"
            ],404);
        }
    }

    public function update(Request $request, $id){
        if(Instituicao::where('id',$id)->exists()){
            $instituicao = Instituicao::find($id);
            $instituicao->cnpj = is_null($request->cnpj) ? $instituicao->cnpj : $request->cnpj;
            $instituicao->nome = is_null($request->nome) ? $instituicao->nome : $request->nome;
            $instituicao->email = is_null($request->email) ? $instituicao->email : $request->email;
            $instituicao->senha = is_null($request->senha) ? $instituicao->senha : $request->senha;
            $instituicao->telefone = is_null($request->telefone) ? $instituicao->telefone : $request->telefone;
            $instituicao->cep = is_null($request->cep) ? $instituicao->cep : $request->cep;
            $instituicao->logradouro = is_null($request->logradouro) ? $instituicao->logradouro : $request->logradouro;
            $instituicao->complemento = is_null($request->complemento) ? $instituicao->complemento : $request->complemento;
            $instituicao->bairro = is_null($request->bairro) ? $instituicao->bairro : $request->bairro;
            $instituicao->cidade = is_null($request->cidade) ? $instituicao->cidade : $request->cidade;
            $instituicao->uf = is_null($request->uf) ? $instituicao->uf : $request->uf;
            $instituicao->crn_responsavel = is_null($request->crn_responsavel) ? $instituicao->crn_responsavel : $request->crn_responsavel;
            $instituicao->status_recebimento = is_null($request->status_recebimento) ? $instituicao->status_recebimento : $request->status_recebimento;
            $instituicao->save();
            return response()->json([
                "message"=> "instituicao editada"
        ],200);
        }else{
            return response()->json([
                "message"=> "instituicao nao encontrada"
            ],404);
        }
    }

    public function destroy($id){
        if(Instituicao::where('id',$id)->exists()){
            $instituicao = Instituicao::find($id);
            $instituicao->delete();

            return response()->json([
                "message" => "instituicao excluida"
            ],202);
        }else{
            return response()->json([
                "message" =>  "instituicao nao encontrada"
            ],404);
        }

    }
}
