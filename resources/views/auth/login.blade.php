<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acessar</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">    
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/01f1f91eb3.js" crossorigin="anonymous"></script>
    <!-- Fontes padrão -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Kosugi+Maru&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="overlay"></div>
        <div class="container">
            <form action="{{route('login.auth')}}" method="POST" enctype="multipart/form-data" id="login-form">
                @csrf
                <h3 class="mb-3">Acesse sua conta utilizando suas credenciais.</h3>
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="**********">
                </div>
                <button type="submit" class="btn-login">Entrar</button>
                <div class="mt-3 d-flex justify-content-around cadastrar">
                    <p>Não possui uma conta? </p><a href="{{ route('cadastro.form') }}">  Cadastrar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
    <!-- Sweet Alert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Função para fazer Login
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');

            $('#login-form').on('submit', function(event) {
                event.preventDefault();

                // Recebe os valores sem máscara do formulário
                const formData = {
                    cpf: $('#cpf').cleanVal(),
                    password: $('#password').val(),
                    _token: $('input[name="_token"]').val()
                };

                $.ajax({
                    url: "{{ route('login.auth') }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        // Se o cadastro for bem-sucedido, usuário redirecionado para home
                        window.location.href = response.redirect_url;                                                
                    },
                    error: function(jqXHR) {
                        // Trata o erro e exibe a mensagens de erro  personalizadas
                        if (jqXHR.status === 404) {
                            Swal.fire({
                                title: 'Erro!',
                                text: 'CPF não encontrado.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                        if (jqXHR.status === 401) {
                            Swal.fire({
                                title: 'Erro!',
                                text: 'Senha inválida.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        } 
                        
                        if (jqXHR.status === 422) {
                            Swal.fire({
                                title: 'Erro!',
                                text: 'Dados inválidos.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }                          
                    }
                });
            });
        });
    </script>
</body>
</html>