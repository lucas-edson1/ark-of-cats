<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\UserFavorite;


class GatoController extends Controller
{

    // Link da API para realizar as requisições
    private $apiUrl = 'https://api.thecatapi.com/v1/';

    public function search(Request $request){
        $breedName = $request->input('breed');
        $user = auth()->user();
        
        // Chama a função para buscar o ID da raça pelo nome
        $breedId = $this->getBreedIdByName($breedName);

        if ($breedId) {
            // Faz a requisição GET para buscar as imagens com base no ID da raça
            $response = Http::withHeaders([
                'x-api-key' => config('services.cat_api.key'),
            ])->get(config('services.cat_api.url') . 'images/search', [
                'limit' => 30,
                'breed_ids' => $breedId
            ]);

            $cats = $response->json();

            // Se o usuário estiver logado
            if ($user) {
                // Busca os IDs dos gatos favoritados pelo usuário na tabela 'userFavorites'
                $favoriteCatIds = $user->favoriteCats()->pluck('cat_id')->toArray();
    
                // Adiciona uma chave 'is_favorite' ao resultado, indicando se o gato está favoritado
                foreach ($cats as &$cat) {
                    $cat['is_favorite'] = in_array($cat['id'], $favoriteCatIds);
                }
            }

            // Se não encontrar gatos para a raça, retorna a mensagem ao usuário na tela
            if (empty($cats)) {
                return response()->json(['message' => 'Não encontramos nenhum gato.']);
            }

            // Retorna os dados dos gatos em JSON
            return response()->json($cats);
        } else {
            // Retorna erro se a raça não for encontrada
            return response()->json(['error' => 'Raça não encontrada'], 404);
        }
    }

    // Função para pesquisar o ID de raça pelo nome digitado pelo usuário
    public function getBreedIdByName($breedName)
    {
        // Faz uma requisição GET para buscar todas as raças
        $response = Http::withHeaders([
            'x-api-key' => config('services.cat_api.key'),
        ])->get(config('services.cat_api.url') . 'breeds');

        $breeds = $response->json();

        // Procura a raça pelo nome
        foreach ($breeds as $breed) {
            // Se o campo name da API for igual ao nome da raça digitado pelo usuário, retorna o ID
            if (strtolower($breed['name']) === strtolower($breedName)) {
                return $breed['id']; 
            }
        }
        // Caso a raça não seja encontrada, retorna null
        return "Raça não encontrada.";
    }

    public function favoritar(Request $request){
        // Recebe do formulário o usuário logado e o id do card do gato que ele clicou
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'cat_id' => 'required|string'
        ]);

        // Instancia um novo UserFavorite
        $favorite = new UserFavorite();
        $favorite->user_id = $request->user_id;
        $favorite->cat_id = $request->cat_id;
        $favorite->breed_name = $request->breed_name;

        // Tenta criar o registro do vínculo entre usuário e gato
        try {
            $favorite->save();
            return response()->json([
                'success' => true,
                'message' => 'Gato favoritado com sucesso!'
            ], 201);
        
        } catch (\Exception $e) {
            // Se falhar retorna uma exceção
            return response()->json([
                'success' => false,
                'message' => 'Erro ao favoritar gato.',
                'error' => $e->getMessage()
            ], 500);
        }
        
    }
}
