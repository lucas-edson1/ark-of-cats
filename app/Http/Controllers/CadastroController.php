<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function cadastroCreate(){
        // Retorna a view de cadastro para o usuário
        return view('auth.cadastro');
    }

    public function cadastrar(Request $request){
        // Valida os dados enviados pela requisição antes de cadastrar o usuário
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'cpf' => 'required|string|size:11|unique:users',
            'password' => 'required|string|min:8',
            'sexo' => 'nullable|in:1,2',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',            
            'email.unique' => 'O e-mail já existe em nosso sistema.',
            'phone.required' => 'O telefone é obrigatório.',
            'cpf.size' => 'O CPF precisa ter 11 dígitos.',
            'cpf.unique' => 'Já existe um usuário para esse CPF.',
            'password.required' => 'A senha é obrigatória.'
        ]);

        // Utiliza a criptografia bcrypt do Laravel para salvar no banco com mais segurança
        $validatedData['password'] = bcrypt($request->password);

        // Tenta criar o novo registro no banco, se salvar o retorno é de success
        try {
            $validatedData = User::create($validatedData);
        
            return response()->json([
                'message' => 'Cadastro realizado com sucesso!'
            ], 201);
        
        } catch (\Exception $e) {
            // Se falhar retorna uma exceção
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar o usuário.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
