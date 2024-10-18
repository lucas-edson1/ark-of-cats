@extends('app.layout')
@section('title', 'Página Inicial - AOC ')
@section('content')

    <div class="container container-home">
        <div class="welcome-message">
            <i class="fa-solid fa-cat"></i>
            <p>Bem-vindo à Arca dos Gatos. Para pesquisar seus gatos favoritos, insira uma raça:</p>
            <i class="fa-solid fa-paw"></i>
        </div>
        <form class="d-flex search-cat" id="cat-search-form" role="search">
            <input class="form-control" type="search" placeholder="Insira uma raça.." aria-label="Search" id="breed" name="breed">
            <button class="btn btn-success" type="submit">Pesquisar</button>
        </form>

        <!-- Div que exibirá os resultados do search do usuário-->
        <div class="row mt-4" id="results-container">
        </div>
    </div>

@endsection

<!-- Scripts com Requisições AJAX -->
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#cat-search-form').on('submit', function(event) {
                event.preventDefault();
                let breed = $('#breed').val();

                Swal.fire({
                    title: 'Carregando...',
                    text: 'Aguarde enquanto buscamos os gatos.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: "{{ route('search.breed') }}",
                    method: "GET",
                    data: { breed: breed },
                    timeout: 10000,
                    success: function(cats) {
                        // Após o sucesso da requisição, limpa resultados anteriores
                        Swal.close();
                        $('#results-container').empty();

                        // Se a API não encontrar nenhum gato, retorna uma mensagem de não encontrado
                        if (cats.message) {
                            $('#results-container').append(`
                                <div class="not-found-msg">
                                    <p>${cats.message}</p>
                                    <i class="fa-regular fa-face-sad-tear"></i>
                                </div>`                    
                            )
                        } else {
                            // Itera sobre os resultados e cria os cards
                            cats.forEach(function(cat) {
                                const favoriteButton = cat.is_favorite 
                                    ? '<button type="submit" class="btn btn-favorited disabled"><i class="fa-solid fa-heart"></i></button>'
                                    : '<button type="submit" class="btn btn-primary">Favoritar</button>';
                                
                                // Criando a estrutura HTML de cada Card que aparecerá nos resultados
                                const cardHtml = `
                                    <div class="col-lg-3 col-md-4 mb-3 col-sm-6 col-xs-12">
                                        <div class="card card-pattern">
                                            <img src="${cat.url}" class="card-img-top" alt="${cat.breeds[0] ? cat.breeds[0].name : 'Raça Desconhecida'}">
                                            <div class="card-body">
                                                <h5 class="card-title">${cat.breeds[0] ? cat.breeds[0].name : 'Raça Desconhecida'}</h5>                                    
                                                <form id="cat-favorite-form">
                                                    @csrf
                                                    @auth

                                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"/>

                                                    @endauth
                                                    
                                                    <input type="hidden" name="cat_id" value="${cat.id}"/>
                                                    <input type="hidden" name="breed_name" value="${cat.breeds[0].name}"/>
                                                    ${favoriteButton}                                       
                                                </form>
                                            </div>
                                        </div>
                                    </div>`;
                                $('#results-container').append(cardHtml);
                            });}
                    },
                    error: function(jqXHR) {                                                
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro!',
                            text: jqXHR.responseJSON ? jqXHR.responseJSON.message : 'Erro ao processar a requisição.'
                        });
                    }
                });
            });
        });

        // Função para favoritar um gato
        $(document).ready(function() {            
            $('#results-container').on('submit', '#cat-favorite-form', function(event) {
                event.preventDefault(); 

                // Verifica se o usuário está logado
                const userId = "{{ auth()->check() ? auth()->user()->id : 'null' }}";
                
                // Cria a modal de confirmação com o plugin Sweet Alert
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                    confirmButton: "btn btn-success me-2",
                    cancelButton: "btn btn-danger ms-2"
                    },
                    buttonsStyling: false
                });

                if (userId === 'null') {
                    // Se o usuário não está logado
                    swalWithBootstrapButtons.fire({
                        title: 'Oops!',
                        text: 'Você precisa logar para favoritar um gato.',
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: 'Logar',
                        cancelButtonText: 'Continuar na Página',
                        reverseButtons: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('login.form') }}";
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.close();
                        }
                    });
                    return;
                }

                // Recebe os dados do formulário e os serializa para fazer a requisição na rota certa
                const form = $(this);
                const url = "{{ route('favoritar.cat') }}";
                const data = form.serialize();

                // Requisição AJAX para favoritar o gato
                $.ajax({
                    url: url,
                    method: "POST",
                    data: data,
                    success: function(response) {                                
                        // Troca a cor do botão para mostrar ao usuário que o gato foi favoritado
                        form.find('button').html('<i class="fa-solid fa-heart"></i>').removeClass('btn-primary').addClass('btn-favorited').attr('disabled', true);
                    },
                    error: function(jqXHR) {                                                
                        // Dispara modal de erro
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro!',
                            text: jqXHR.responseJSON ? jqXHR.responseJSON.message : 'Erro ao processar a requisição.'
                        });
                    }
                });
            });
        });
    </script>
@endsection
