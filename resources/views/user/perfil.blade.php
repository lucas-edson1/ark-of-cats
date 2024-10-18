@extends('app.layout')
@section('title', 'Seu Perfil')
@section('content')
    <div class="container pt-4 pb-4">
        <h2>Meu Perfil</h2>

        <!-- Seção de Dados do Usuário que podem ser atualizados -->
        <form id="update-profile-form" action="{{route('user.atualizar')}}" >
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                </div>
                <div class="form-group col-md-6 mb-3" >
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="phone">Número para Contato</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->phone }}" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{ auth()->user()->cpf }}" disabled required>                
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="password">Nova Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nova senha..">
                </div>
                <div class="col-md-6 mb-3 mt-4">
                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <h3 class="mt-4">Gatos Favoritos</h3>
        <div id="favorite-cats" class="row">
            <!-- Os gatos favoritos serão inseridos aqui via AJAX -->
        </div>
    </div>    
@endsection
@section('scripts')
    <script>
        const imageUrlBase = "https://cdn2.thecatapi.com/images/";

        // Definição manual do t oken CSRF para utilizar com a diretiva Patch do Laravel
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        // Função para buscar os gatos favoritos do usuário
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('user.favorites') }}",
                method: "GET",
                success: function(favorites) {
                    $('#favorite-cats').empty();
                    if (favorites.length === 0) {
                        // Exibe uma mensagem caso não haja favoritos
                        $('#favorite-cats').append('<p>Você ainda não favoritou nenhum gato.</p>');
                    } else {
                        // Cria a estrutura de card para exibir os gatos favoritos do usuário
                        favorites.forEach(function(favorite) {
                            const imageUrl = imageUrlBase + favorite.cat_id + '.jpg';
                            const cardHtml = `
                                <div class="col-lg-3 col-md-4 mb-3 col-sm-6 col-xs-12">
                                    <div class="card card-pattern">
                                        <img src=${imageUrl} class="card-img-top" alt="Gato favorito">
                                        <div class="card-body">
                                            <h5 class="card-title">${favorite.breed_name}</h5>
                                            <form data-id=${favorite.id} method="POST" class="remove-favorite-form">
                                                @csrf
                                                @method('DELETE')                                        
                                                    <button type="submit" class="btn btn-danger">Remover dos Favoritos</button>
                                            </form>
                                        </div>                                
                                    </div>
                                </div>`;
                            $('#favorite-cats').append(cardHtml);
                        });
                    }

                    // Adiciona o evento de submit ao formulário após o carregamento dos gatos
                    $('.remove-favorite-form').on('submit', function(e) {
                        e.preventDefault();
                        const form = $(this);

                        // Chama a função confirmModal definida no final do script para personalizar os textos a serem exibidos ao usuário
                        confirmModal(
                            //Título da Modal
                            "Você tem certeza?",
                            // Texto da modal
                            "Deseja remover esse gato dos seus favoritos?",     // Texto de confirmação
                            // Texto do botão de confirmação
                            "Sim, remover!",
                            // Texto do botão de cancelar     
                            "Não, cancelar",
                            function(){
                            const catId = form.data('id');
                            const url = `/perfil/favorites/remover/${catId}`;

                            $.ajax({
                                url: url,
                                method: 'DELETE',
                                data: form.serialize(),
                                success: function(response) {
                                    // Atualiza a página e remove o card diretamente                        
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Alterações salvas!',
                                        text: response.success
                                    });
                                    form.closest('.col-md-3').remove();                       
                                },
                                error: function(error) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro',
                                        text: 'Erro ao remover favorito.'
                                    });                                    
                                }
                            })}
                        );
                    });
                },
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: error
                    });
                }
            });
        });

        // Função para atualizar perfil
        $('#update-profile-form').on('submit', function(event) {
            event.preventDefault();

            const form = $(this);
            
            // Chama a função confirmModal definida no final do script para personalizar os textos a serem exibidos ao usuário
            confirmModal(
                // Título da Modal
                "Você tem certeza?",               
                // Texto da Modal
                "Deseja salvar as alterações?",  
                // Texto do botão de confirmação
                "Sim, salvar!",                
                // Texto do botão de cancelamento
                "Não, cancelar",                 
                function() {
                    const url = form.attr('action'); // URL do formulário
                    const data = form.serialize(); // Serializa os dados do formulário

                    $.ajax({
                        url: url,
                        method: "PATCH",
                        data: data,
                        success: function(response) {
                            // Exibe uma mensagem de sucesso
                            Swal.fire({
                                icon: 'success',
                                title: 'Alterações salvas!',
                                text: response.message
                            });
                        },
                        error: function(jqXHR) {
                            // Dispara uma modal de erro
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro!',
                                text: jqXHR.responseJSON ? jqXHR.responseJSON.message : 'Erro ao processar a requisição'
                            });
                        }
                    })
                }
            );
        });

        // Função de chamada de Modal para confirmar requisições
        function confirmModal(title, text, confirmText, cancelText, onConfirm) {
        // Define estilização da Modal
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
            confirmButton: "btn btn-success me-2",
            cancelButton: "btn btn-danger ms-2"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: title,
            text: text,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: confirmText,
            cancelButtonText: cancelText,
            reverseButtons: false
        }).then((result) => {
            if (result.isConfirmed) {
            // Se confirmado, chama a função de callback (onConfirm)
            if (typeof onConfirm === "function") {
                onConfirm(); 
            }
            } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Modal de cancelamento
            swalWithBootstrapButtons.fire({
                title: "Cancelado",
                text: "Nenhuma alteração foi feita.",
                icon: "error"
            });
            }
        });
        }
    </script>
@endsection