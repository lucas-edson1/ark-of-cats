<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
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
    <nav class="navbar navbar-expand-lg navbar-container">
        <div class="container header-container">
            <a class="navbar-brand" href="{{ route('app.home') }}">
                <div class="logo-container">
                    <div class="text-container">
                        <p class="text-top">A Arca</p>
                        <p class="text-bottom">dos Gatos</p>
                    </div>
                    <i class="fa-solid fa-ship"></i>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                @auth
                    <div class="dropdown d-lg-block d-none ml-auto"> <!-- Apenas visível em telas grandes -->
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Olá, {{ auth()->user()->name }}!
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('user.perfil') }}" class="dropdown-item">Perfil</a></li>
                            <li><a href="{{ route('login.logout') }}" class="dropdown-item">Logout</a></li>
                        </ul>
                    </div>
                    <div class="d-lg-none">
                        <a href="{{ route('user.perfil') }}" class="dropdown-item">Perfil</a>
                        <a href="{{ route('login.logout') }}" class="dropdown-item">Logout</a>
                    </div>
                @endauth

                @guest
                    <div class="auth-buttons ml-auto"> <!-- Adicionado ml-auto para mover à direita -->
                        <a href="{{ route('login.form') }}" class="btn btn-outline-light">Login</a>
                        <a href="{{ route('cadastro.form') }}" class="btn btn-outline-light">Cadastre-se</a>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
   
    <div class="full-screen-container">
        @yield('content')
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('scripts')

    <!-- Script para mostrar/ocultar as opções de perfil e logout no menu colapsável -->
    <script>
        
        const navbarToggler = document.querySelector('.navbar-toggler');
        const collapseMenu = document.querySelector('.collapse-menu');
        const greetingMessage = document.querySelector('.greeting-message');

        navbarToggler.addEventListener('click', () => {
            if (collapseMenu.style.display === "none" || collapseMenu.style.display === "") {
                collapseMenu.style.display = "block";
                greetingMessage.style.display = "none";
            } else {
                collapseMenu.style.display = "none";
                greetingMessage.style.display = "inline";
            }
        });
    </script>
    
</body>
</html>