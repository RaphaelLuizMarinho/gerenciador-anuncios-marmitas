<?php
namespace App\Http\Controllers;

use App\Models\Doador;
use App\Models\Instituicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);
        $instituicao = Instituicao::where('email', $request->email)->first();
        if ($instituicao && Hash::check($request->senha, $instituicao->senha)) {
            $token = $instituicao->createToken($instituicao->email)->plainTextToken;
            return response()->json([
                'message' => 'Login realizado com sucesso.',
                'tipo' => 'instituicao',
                'token' => $token,
                'usuario' => $instituicao,
            ], 200);
        }
        $doador = Doador::where('email', $request->email)->first();
        if ($doador && Hash::check($request->senha, $doador->senha)) {
            $token = $doador->createToken($doador->email)->plainTextToken;
            return response()->json([
                'message' => 'Login realizado com sucesso.',
                'tipo' => 'doador',
                'token' => $token,
                'usuario' => $doador,
            ], 200);
        }

        return response()->json([
            'message' => 'Email ou senha incorretos.',
        ], 401);
    }
}
