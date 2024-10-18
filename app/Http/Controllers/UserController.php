<?php

namespace App\Http\Controllers;
use App\Models\UserFavorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Função que retorna a view do Perfil para o usuário
    public function perfil(){

        // Se o usuário não está logado ele não pode acessar uma página de perfil
        if (!auth()->check()) {
            return redirect()->route('app.home');
        }
        return view('user.perfil');
    }

    // Função para exibir os gatos favoritos do usuário na página de perfil
    public function getFavorites(){

        // Obtem o usuário logado
        $user = Auth::user();
        
        // Obtem os gatos favoritos do usuário
        $favorites = $user->favoriteCats()->get();

        // Retorna os dados em JSON com os gatos favoritados do usuário
        return response()->json($favorites);
    }

    // Função para remover algum gato da lista dos favoritos
    public function removeFavorite($id){

        $user = auth()->user();

        // Busca o gato favorito pelo ID e verifica se está vinculado ao usuário autenticado
        $favorite = UserFavorite::where('id', $id)->where('user_id', $user->id)->first();

        // Se o usuário não está vinculado ao gato
        if (!$favorite) {
            return response()->json(['error' => 'Favorito não encontrado ou não pertence ao usuário'], 404);
        }

        // Se o vínculo existir no banco, deletar e retornar mensagem de sucesso
        $favorite->delete();
        return response()->json(['success' => 'Favorito removido com sucesso']);
    }

    // Função para atualizar os dados do usuário logado
    public function atualizar(Request $request) {
        
        // Validação dos dados (email, nome, etc.)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'password' => 'nullable|min:8',
        ]);

        // Atualiza o nome, o e-mail e o telefone
        $user = auth()->user();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];

        // Se o campo de senha não estiver vazio, atualiza a senha
        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);        
        }

        // Salva as alterações
        if($user->save()){
            return response()->json([
                'message' => 'Perfil atualizado com sucesso!'
            ]);
        } else {
            // Se houver um erro, retorna ao usuário
            return response()->json([
                'message' => 'Houve um erro ao atualizar o perfil'
            ]);   
        }            
    }
}
