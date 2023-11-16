<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="build/assets/images/favicon.png" type="">
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="build/assets/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="build/assets/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="build/assets/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="build/assets/css/responsive.css" rel="stylesheet" />


        <title>Sistema</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

       
    </head>
    <body class="antialiased">

        <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">

               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="index.html"><img width="250" src="build/assets/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                     @if (Route::has('login'))
                    @auth
                        <li class="nav-item active">
                            <a href="{{ url('/dashboard') }}" class="nav-link">Página Inicial</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Acessar</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Registre-se</a>
                            </li>
                        @endif
                    @endauth
            @endif                     
            </li>           
                     </ul>
                  </div>
               </nav>
            </div>
         </header>

      <!-- arrival section -->
      <section class="arrival_section">
         <div class="container">
            <div class="box">
               <div class="arrival_bg_box">
                  <img src="build/assets/images/arrival-bg.png" alt="">
               </div>
               <div class="row">
                  <div class="col-md-6 ml-auto">
                     <div class="heading_container remove_line_bt">
                        <h2>
                           #Inovação
                        </h2>
                     </div>
                     <p style="margin-top: 20px;margin-bottom: 30px;">
                     Descubra o poder da inovação em suas mãos - adquira agora nosso produto e transforme suas experiências!
                     </p>
                     <a href="">
                     Compre agora!
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end arrival section -->

      <!-- end product section -->

      <!-- end client section -->
      <!-- footer start -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img width="210" src="build/assets/images/logo.png" alt="#" /></a>
                      </div>
                      <div class="information_f">
                        <p><strong>Endereço:</strong> Rua altíssimo Tounier,130, Coloninha,Araranguá, Santa Catarina</p>
                        <p><strong>Celular:</strong> (48) 98826-7279</p>
                        <p><strong>Email:</strong> carlosmiguelsouza2011@gmail.com</p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                        @if (Route::has('login'))
                    @auth
                        <li class="nav-item active">
                            <a href="{{ url('/dashboard') }}" class="nav-link">Página Inicial</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Acessar</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Registre-se</a>
                            </li>
                        @endif
                    @endauth
            @endif   
                        </ul>
                     </div>
                  </div>

                     </div>
                  </div>     
                  <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>Entre em Contato</h3>
                        <div class="information_f">
                          <p>Escreva um email!</p>
                        </div>
                        <div class="form_sub">
                           <form>
                              <fieldset>
                                 <div class="field">
                                    <input type="email" placeholder="Digite seu Email" name="email" />
                                    <input type="submit" value="Enviar" />
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 Todos direitos reservados para <a href="https://html.design/">Free Html Templates</a><br>
         
            Distribuído por <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="build/assets/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="build/assets/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="build/assets/bootstrap.js"></script>
      <!-- custom js -->
      <script src="build/assets/js/custom.js"></script>
   </body>
</html>