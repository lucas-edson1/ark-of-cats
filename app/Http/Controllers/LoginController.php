<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    // Função que retorna a view de Login para o usuário
    public function loginCreate(Request $request){
        return view('auth.login');
    }

    // Função que faz o processo de autenticação
    public function auth(Request $request){
        // Valida as credenciais inseridas pelo usuário
        $credenciais = $request->validate([            
            'cpf' => ['required'],
            'password' => ['required'],
        ], [
            'cpf.required' => 'O campo de CPF é obrigatório.',
            'password.required' => 'O campo de senha é obrigatório.',
        ]);

        // Verifica se o CPF existe no banco
        $user = User::where('cpf', $credenciais['cpf'])->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'CPF não existe em nosso banco de dados.'
            ], 404);
        }

        // Valida se a senha inserida é válida
        if (!Auth::attempt($credenciais)) {
            return response()->json([
                'success' => false,
                'message' => 'Senha inválida.'
            ], 401);
        }

        // Se o CPF existe e a senha é válida, tentar autenticação
        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return response()->json([
                'success' => true,
                'message' => 'Login bem-sucedido!',
                'redirect_url' => route('app.home')
            ]);
        } else {
            // Se os campos não atenderem os requisitos ou estiverem vazios
            return response()->json([
                'success' => false,
                'message' => 'Credenciais inválidas.'
            ], 422);        
        }
    }

    // Função para desloga
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect(route('app.home'));
    }
}
