<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Cadastre-se</title>
      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <!-- CSS -->
      <link rel="stylesheet" href="{{asset('css/reset.css')}}">
      <link rel="stylesheet" href="{{asset('css/style.css')}}">    
      <!-- Font Awesome Icons -->
      <script src="https://kit.fontawesome.com/01f1f91eb3.js" crossorigin="anonymous"></script>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Kosugi+Maru&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

      <!-- Gatinho animado -->
      <link xmlns="http://www.w3.org/1999/xhtml" href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="d-flex cadastro-screen">
        <div class="cadastro-container">            
            <div class="container"> 
                <form action="{{route('cadastro.save')}}" method="POST" enctype="multipart/form-data" id="cadastro-form" class="form-content row">
                    @csrf
                    <div class="mb-3 col-md-12 col-sm-6">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Insira seu nome" required>
                    </div>
                    <div class="mb-3 col-md-12 col-sm-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" required>
                    </div>
                    <div class="mb-3 col-md-12 col-sm-6">
                        <label for="phone" class="form-label">Número para Contato</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="99999-9999" required>
                    </div>
                    <div class="mb-3 col-md-12 col-sm-6">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                    </div>
                    <div class="mb-3 col-md-12 col-sm-6">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="**********" required>
                    </div>
                    <div class="col-md-12 col-sm-6">
                      <select class="form-select" aria-label="Default select example" name="sexo">
                          <option selected value="">Selecione o sexo (Opcional)</option>
                          <option value="1">Masculino</option>
                          <option value="2">Feminino</option>            
                      </select>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <button type="submit" class="btn-cadastrar mt-3">Cadastrar</button>
                    </div>                    
                </form>           
            </div>
        </div>        
        <div class="cat-layout">
            <div class="overlay"></div>
            <div class="cat-layout-content">
                <div class="text-content">
                    <h2>Venha fazer parte do nosso mundo.</h2>
                    <div class="container">
                    <p>Em um mundo onde a conexão entre humanos e animais de estimação é cada vez mais valorizada, 
                        surge a Arca dos Gatos. Este sistema de consumo de API é um verdadeiro santuário 
                        para os amantes de felinos, permitindo que os usuários explorem, descubram e, o mais 
                        importante, favoritem seus gatos de raça preferida com apenas alguns cliques.  Crie sua conta
                    e vamos navegar juntos!</p>

                    <i class="fa-solid fa-ship icon mt-4"></i>
                    </div>
                </div>

              <!-- Container com a animação de um gatinho -->
              <div class="container-animated-cat">                
                  <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                  <defs>                  
                    <style>
                      text {
                        text-anchor: middle;
                        font: 32px 'Amatic Sc';
                        text-rendering: geometricPrecision;
                      }
                
                      .type {
                        font-size: 25px
                      }
                
                      .type2 {
                        font-size: 15px
                      }
                    </style>
                  </defs>
                  <svg class="cat" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="250.113px" height="176.873px" viewBox="0 -10 121.113 156.873" enable-background="new 0 0 121.113 146.873" xml:space="preserve">
                    <g id="Body">
                      <path fill="#667069" d="M25.817,81.639c0.015-1.294,39.25-19.5,39.25-19.5l11.39,1.706c0,0,11,0.966,14.25,2.295
                        s8.125,5.205,9.25,7.205s2.698,10.888,2.25,13.5s-2.375,15.417-3,17.5s-5.25,17.5-5.25,17.5l-70-5
                        C23.957,116.845,25.803,82.933,25.817,81.639z" />
                    </g>
                
                    <g id="Collar">
                      <path fill="#D82551" d="M63.608,60.912c0,0-14.735,14.433-19.401,16.766s-18.864,4.667-18.864,4.667v3.333
                        c0,0,16.698-3.667,20.031-5s20.333-18.134,20.333-18.134L63.608,60.912z" />
                      <circle fill="#E5B438" cx="25.874" cy="83.762" r="1.917" />
                      <ellipse fill="#FEC23B" cx="26.666" cy="83.762" rx="0.848" ry="1.083" />
                    </g>
                
                    <g id="Stripes">
                      <polygon fill="#352E23" points="67.771,62.544 73.254,63.365 67.771,77.845 	" />
                      <polygon fill="#EA7425" points="75.026,63.935 80.568,64.082 76.892,79.122 	" />
                      <polygon fill="#E5CEBB" points="83.604,64.453 89.087,65.274 83.604,79.754 	" />
                    </g>
                
                    <g id="Leg1">
                      <path fill="#667069" d="M23.957,115.845l10.5,0.75l-1.923,16.25c0,0-0.702,7.125-3.327,7.5s-5.25-2.75-5.25-2.75
                        s-1.976-4.764-1.803-6.25S23.957,115.845,23.957,115.845z" />
                    </g>
                
                    <text class="type meow" x="5" y="0" fill="black" transform="rotate(-30 30,40)">Meow</text>
                
                    <text class="type2 meow" x="35" y="5" fill="black" transform="rotate(30 30,40)">Meow</text>
                
                    <text class="type2 meow" x="-30" y="90" fill="black" transform="rotate(10 30,40)">Meow</text>
                
                    <g id="Head">
                      <path fill="#667069" d="M25.817,81.639c0,0-3.417-2.834-5.25-3.75s-5.979-0.532-13-5c-8.25-5.25-7.25-8.75-7.25-8.75
                        c-0.714-10.328,0-10.5,0-16.75s2.75-12.25,2.75-12.25s3.084-15.241,3.75-16.5s1.417-4.251,2.25-4.25s4.75,8.665,6,9.75
                        s17,3.5,17,3.5l10.25,2.25c0,0,6.75,1.832,8.5,1.25s5.75-6.335,7.25-6.5s1.942,1.07,2,2s1.25,30.582,2,32.25s3,3.25,3,3.25l-21,16
                        L25.817,81.639z" />
                      <g id="Eyes">
                        <path fill="#E2E2E2" stroke="#345276" stroke-miterlimit="10" d="M2.582,48.345c0.542-1.208,5.041-2.708,7.125-2.875
                      s8,3,7.875,4.375s-3.375,5.125-5,5.5s-2.625-0.042-4.875-0.75S2.04,49.553,2.582,48.345z" />
                        <path fill="#345276" d="M15.082,48.657c0,1.76-1.427,3.188-3.188,3.188s-3.188-1.427-3.188-3.188c0-0.728,0.973-2.562,2.251-2.688
                      C12.771,45.791,15.082,47.625,15.082,48.657z" />
                        <path fill="#EAEAEA" stroke="#345276" stroke-miterlimit="10" d="M42.636,53.771c0.542-1.208,5.041-2.708,7.125-2.875
                      s8,3,7.875,4.375s-3.375,5.125-5,5.5s-2.625-0.042-4.875-0.75S42.094,54.98,42.636,53.771z" />
                        <path fill="#345276" d="M55.136,54.084c0,1.76-1.427,3.188-3.188,3.188s-3.188-1.427-3.188-3.188c0-0.728,0.973-2.562,2.251-2.688
                      C52.825,51.217,55.136,53.051,55.136,54.084z" />
                      </g>
                      <!--end eyes-->
                
                      <g id="EyesClosed">
                        <line fill="none" stroke="#345276" stroke-miterlimit="10" x1="2.808" y1="46.818" x2="17.301" y2="50.984" />
                        <line fill="none" stroke="#345276" stroke-miterlimit="10" x1="56.976" y1="54.07" x2="41.905" y2="54.586" />
                      </g>
                      <!--end EyesClosed -->
                
                      <g id="Eyebrows">
                        <g>
                          <path fill="#E2E2E2" d="M9.372,38.398c0,0,0.185,0.336,0.236,0.699c0.077,0.378,0.014,0.78-0.182,1.099
                        c-0.199,0.316-0.531,0.55-0.906,0.646c-0.35,0.112-0.734,0.092-0.734,0.092S7.6,40.596,7.547,40.232
                        c-0.077-0.379-0.013-0.78,0.185-1.097c0.201-0.315,0.534-0.547,0.908-0.645C8.989,38.379,9.372,38.398,9.372,38.398z" />
                        </g>
                        <g>
                          <path fill="#E5E5E5" d="M12.492,39.788c0,0,0.136,0.358,0.137,0.726c0.023,0.385-0.096,0.774-0.333,1.063
                        c-0.241,0.286-0.603,0.471-0.987,0.514c-0.362,0.062-0.74-0.012-0.74-0.012s-0.138-0.359-0.139-0.727
                        c-0.024-0.387,0.096-0.774,0.335-1.061c0.243-0.284,0.605-0.468,0.989-0.512C12.116,39.716,12.492,39.788,12.492,39.788z" />
                        </g>
                        <g>
                          <path fill="#E5E5E5" d="M14.969,40.869c0,0,0.213,0.318,0.297,0.676c0.109,0.37,0.081,0.775-0.086,1.11
                        c-0.171,0.332-0.481,0.594-0.847,0.722c-0.339,0.142-0.724,0.155-0.724,0.155s-0.215-0.319-0.299-0.677
                        c-0.11-0.371-0.081-0.775,0.088-1.109c0.173-0.331,0.484-0.592,0.849-0.721C14.586,40.883,14.969,40.869,14.969,40.869z" />
                        </g>
                        <g>
                          <path fill="#E8E8E8" d="M47.811,43.533c0,0,0.213,0.318,0.297,0.676c0.109,0.37,0.081,0.775-0.086,1.11
                        c-0.171,0.332-0.481,0.594-0.847,0.722c-0.339,0.142-0.724,0.155-0.724,0.155s-0.215-0.319-0.299-0.677
                        c-0.11-0.371-0.081-0.775,0.088-1.109c0.173-0.331,0.484-0.592,0.849-0.721C47.428,43.547,47.811,43.533,47.811,43.533z" />
                        </g>
                        <g>
                          <path fill="#E5E5E5" d="M50.695,45.383c0,0,0.025,0.382-0.081,0.734c-0.091,0.375-0.318,0.712-0.63,0.918
                        c-0.314,0.203-0.714,0.274-1.095,0.203c-0.364-0.047-0.704-0.228-0.704-0.228s-0.026-0.384,0.08-0.736
                        c0.09-0.377,0.317-0.712,0.631-0.917c0.315-0.201,0.716-0.271,1.096-0.2C50.356,45.204,50.695,45.383,50.695,45.383z" />
                        </g>
                        <g>
                          <path fill="#E8E8E8" d="M54.56,46.197c0,0,0.025,0.382-0.081,0.734c-0.091,0.375-0.318,0.712-0.63,0.918
                        c-0.314,0.203-0.714,0.274-1.095,0.203c-0.364-0.047-0.704-0.228-0.704-0.228s-0.026-0.384,0.08-0.736
                        c0.09-0.377,0.317-0.712,0.631-0.917c0.315-0.201,0.716-0.271,1.096-0.2C54.221,46.018,54.56,46.197,54.56,46.197z" />
                        </g>
                      </g>
                      <!--end eyebrows-->
                
                      <g id="Mouth">
                        <path fill="#D82551" d="M21.579,64.94l3.099-3.257l1.988,3.708c0,0-0.495,4.118-3.245,3.868S21.579,64.94,21.579,64.94" />
                      </g>
                      <!--end Mouth-->
                
                      <g id="Nose">
                        <g>
                          <path fill="#EAEAEA" stroke="#EAEAEA" stroke-miterlimit="10" d="M22.343,53.56c0.209-0.458,5.916-0.542,6.167,0
                        s-1.75,4.645-2.333,4.593s-0.808-0.674-1.787-1.373s-1.756-1.212-2.047-1.571S22.134,54.018,22.343,53.56z" />
                          <path fill="none" stroke="#EAEAEA" stroke-width="2" stroke-miterlimit="10" d="M25.818,57.226c0,4.927-3.792,8.914-8.479,8.914" />
                          <path fill="none" stroke="#EAEAEA" stroke-width="2" stroke-miterlimit="10" d="M29.463,68.64c-2.278,0-4.12-5.454-4.12-12.193" />
                        </g>
                      </g>
                      <!--end nose-->
                
                    </g>
                    <!--end head-->
                
                    <g id="Leg2">
                      <path fill="#667069" d="M43.598,117.248l12.002,0.857l-3.018,17.99c0,0-0.625,6.5-4.125,7.5s-5.5-4-6.25-6.125
                        S43.598,117.248,43.598,117.248z" />
                    </g>
                
                    <g id="Leg3">
                      <path fill="#667069" d="M67.771,118.974l10.025,0.716c0,0-0.817,15.204-1.34,16.779s-2.418,7.542-3.203,7.875
                        s-2.922,1.375-4.922,1.25s-2.75-1.25-3.875-3.375S67.771,118.974,67.771,118.974z" />
                    </g>
                
                    <g id="Leg4">
                      <path fill="#667069" d="M87.09,120.354l9.162-7.159c0,0-2.17,21.899-2.295,24.024s-3.875,8.385-3.875,8.385s-0.875,1.49-2.25,1.24
                        s-2.125-2-2.125-2L87.09,120.354z" />
                      <g>
                        <path fill="none" stroke="#667069" stroke-width="10" stroke-linecap="round" stroke-miterlimit="10">
                          <animateTransform begin="swing.end" id="pause" dur="3s" type="translate" attributeType="XML" attributeName="transform" />
                          <animate id="swing" attributeName="d" dur="1000ms" fill="freeze" begin="0; pause.end" values="M92.672,81.021
                        c0,0,32.396-22.383,6.592-40.551S77.797,3.55,77.797,6.55;
                
                                    M97.672,82.021
                        c0,0,-20-15.383,15.592-40.551S87.797,3.55,  107.797,8;
                                    
                                    M92.672,81.021
                        c0,0,32.396-22.383,6.592-40.551S77.797,3.55,77.797,6.55" />
                        </path>
                      </g>
                  </svg>
                </div>   
            </div>         
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- Sweet Alert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    

    <!-- -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#phone').mask('00000-0000');
        $('#cpf').mask('000.000.000-00');

        // Função para cadastrar usuário
        $('#cadastro-form').on('submit', function(event) {
            event.preventDefault();

            // Recebe os valores do formulário sem as máscaras
            const formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                phone: $('#phone').cleanVal(), 
                cpf: $('#cpf').cleanVal(),     
                password: $('#password').val(),
                sexo: $('select[name="sexo"]').val(), 
                _token: $('input[name="_token"]').val()
            };

            // Requisição AJAX para cadastrar usuário
            $.ajax({
                url: "{{ route('cadastro.save') }}",
                method: "POST", 
                data: formData, 
                success: function(response) {
                    // Se a requisição for bem sucedida
                    Swal.fire({                            
                        icon: "success",
                        title: response.message,
                        showConfirmButton: true, 
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redireciona para a página de login se o usuário clicar em "OK"
                            window.location.href = "{{ route('login.form') }}";
                        }
                    });
                },
                error: function(jqXHR) {
                    // Verifica se houve mais de um erro nos inputs do usuário
                    if (jqXHR.responseJSON && jqXHR.responseJSON.errors) {
                        // Acessa o primeiro campo de erro
                      const firstError = Object.values(jqXHR.responseJSON.errors)[0][0]; // Pega a primeira mensagem de erro

                      Swal.fire({                            
                          icon: "error",
                          title: "Erro ao realizar cadastro", 
                          // Mostra sempre o primeiro erro para o usuário corrigir até que consiga cadastrar com sucesso
                          text: firstError, 
                          showConfirmButton: true, 
                          confirmButtonText: "OK" 
                      });
                    } else {  
                    Swal.fire({                            
                      icon: "error",
                      title: "Erro ao realizar cadastro", 
                      text: jqXHR.responseJSON.message,
                      showConfirmButton: true, 
                      confirmButtonText: "OK" 
                    });
                  }
                }
            });
        });
      });

      /*********************** 
         Animação do Gatinho
      ************************/ 
      var head = $('#Head');
      var mouth = $('#Mouth');
      var eyesClosed = $("#EyesClosed");
      var eyes = $("#Eyes");
      var meow = $(".meow");

      /*repeat -1 to repeat infinite*/
      var tl = new TimelineMax({repeat:-1, repeatDelay:5}); 
      var tlMeow = new TimelineMax(); 

      // Função para o piscar dos olhos
      var blink = function(){
        tl.add(TweenLite.to(eyes, 0.25, {opacity:0}));
        tl.add(TweenLite.to(eyesClosed, 0.25, {opacity:1}, "-=0.25"));
        tl.add(TweenLite.to(eyesClosed, 0.25, {opacity:0}));
        tl.add(TweenLite.to(eyes, 0.25, {opacity:1}, "-=0.15"));
      };

      // Animação da cabeça mexendo
      tl.add(TweenLite.to(head, 0.25, {rotation:2, delay:1, ease:Sine.easeOut, y:2}));
      tl.add(TweenLite.to(head, 0.25, {rotation:0, ease:Sine.easeOut, y:0})); 

      // Animação do miado
      tl.add(TweenLite.to(mouth, 0.05, {opacity:1}, "-=0.40"));
      tl.add(TweenLite.to(mouth, 0.05, {opacity:0}));

      // Chama a função blink dentro da timeline principal para repetir
      blink();

      // Evento de mouse enter para miado
      $('.cat').mouseenter(function() {
        tlMeow.add(TweenLite.to(mouth, 0.3, {opacity:1}));
        tlMeow.add(TweenLite.to(meow, 0.5, {opacity:1}, "-=1.5"));
        tlMeow.add(TweenLite.to(meow, 0.5, {opacity:0}));
        tlMeow.add(TweenLite.to(mouth, 0.3, {opacity:0}));
      });
   
    </script>
  </body>
</html>