<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Doador;


class DoadorController extends Controller
{
    public function index() {
        $doador = Doador::all();
        return response()->json( $doador, 200 );
    }

    public function store( Request $request ) {
        $doador = new Doador();
        $doador->cnpj = $request->cnpj;
        $doador->nome = $request->nome;
        $doador->email = $request->email;
        $doador->senha = bcrypt($request->senha);
        $doador->telefone = $request->telefone;
        $doador->cep = $request->cep;
        $doador->logradouro = $request->logradouro;
        $doador->complemento = $request->complemento;
        $doador->bairro = $request->bairro;
        $doador->cidade = $request->cidade;
        $doador->uf = $request->uf;
        $doador->save();
        return response()->json( [
            'message' => 'doador cadastrado'
        ],201);
    }

    public function show( $id ) {
        $doador = Doador::find( $id );
        if(!empty($doador)){
            return response()->json($doador);
        }else{
            return response()->json([
                "message"=>"doador nao encontrado"
            ],404);
        }
    }

    public function update(Request $request, $id){
        if(Doador::where('id',$id)->exists()){
            $doador = Doador::find($id);
            $doador->cnpj = is_null($request->cnpj) ? $doador->cnpj : $request->cnpj;
            $doador->nome = is_null($request->nome) ? $doador->nome : $request->nome;
            $doador->email = is_null($request->email) ? $doador->email : $request->email;
            $doador->senha = is_null($request->senha) ? $doador->senha : $request->senha;
            $doador->telefone = is_null($request->telefone) ? $doador->telefone : $request->telefone;
            $doador->cep = is_null($request->cep) ? $doador->cep : $request->cep;
            $doador->logradouro = is_null($request->logradouro) ? $doador->logradouro : $request->logradouro;
            $doador->complemento = is_null($request->complemento) ? $doador->complemento : $request->complemento;
            $doador->bairro = is_null($request->bairro) ? $doador->bairro : $request->bairro;
            $doador->cidade = is_null($request->cidade) ? $doador->cidade : $request->cidade;
            $doador->uf = is_null($request->uf) ? $doador->uf : $request->uf;
            $doador->save();
            return response()->json([
                "message"=> "doador editado"
        ],200);
        }else{
            return response()->json([
                "message"=> "doador nao encontrado"
            ],404);
        }
    }

    public function destroy($id){
        if(Doador::where('id',$id)->exists()){
            $doador = Doador::find($id);
            $doador->delete();

            return response()->json([
                "message" => "doador excluido"
            ],202);
        }else{
            return response()->json([
                "message" =>  "doador nao encontrado"
            ],404);
        }

    }
}
