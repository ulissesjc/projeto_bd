<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API WEB",
 *      description="Estudo da Tecnologia - Banco de Dados I",
 *      @OA\Contact(
 *          email="ulissesc2811@academico.ufs.br"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */

class UserController extends Controller
    
{   

/**
 * @OA\Get(
 *     path="/api/users",
 *     description="Exibir todos os usuários",
 *     @OA\Response(response=200, description="Lista de usuários")
 * )
 */
    public function index(){
        return response()->json(User::all(), 200);
    }

/**
 * @OA\Post(
 *     path="/api/users",
 *     description="Criar um novo usuário",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"cpf","nome","data_nascimento"},
 *             @OA\Property(property="cpf", type="unsignedBigInteger", example=12345678900),
 *             @OA\Property(property="nome", type="string", example="John Cena"),
 *             @OA\Property(property="data_nascimento", type="string", format="date", example="1997-06-02")
 *         )
 *     ),
 *     @OA\Response(response=201, description="Usuário criado com sucesso"),
 *     @OA\Response(response=400, description="Falha na requisição")
 * )
 */

    public function store(Request $request){
        User::create([
            "cpf" => $request->cpf,
            "nome" => $request->nome,
            "data_nascimento" => $request->data_nascimento
        ]);

        return response(["Usuário criado com sucesso", 201]);
    }
}
