<?php

    session_start();
    //unset($_SESSION['deporte']);
    $_SESSION['id_usuario'] = 2;
    echo $_SESSION["id_usuario"];

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Club Eventos Deportivos" />
    <meta name="author" content="Grupo 6" />
    <title>Sports event</title>
    <link href="complements/iconWeb.png" rel="icon">
    <link href="bootstrap-5.2.3-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="bootstrap-5.2.3-dist/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body id="page-top">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <img src="complements/logo.png" alt="logo" class="logo">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item items"><a class="nav-link" href="#index">Inicio</a></li>
                    <li class="nav-item items"><a class="nav-link" href="#about">Eventos</a></li>
                    <li class="nav-item items"><a class="nav-link" href="#services">Deportes</a></li>
                    <li class="nav-item items"><a class="nav-link" href="#signup">Unirse al club</a></li>
                    <li class="nav-item items"><a class="nav-link" href="#signup"><img src="complements/user.png" height="25px" width="25px"></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center bg-opacity-75 bg-light p-5">
                <div class="text-center">
                    <h1 class="text-danger mx-auto my-0 text-uppercase">Club Eventos Deportivos</h1>
                    <h2 class="text-black-50 mx-auto mt-2s">Esto es la página oficial del club Eventos Deportivos</h2>
                </div>
            </div>
        </div>
    </header>
    
    <!-- imagen principal -->
    <div class="container py-3 principal">
        <section class="projects-section bg-light" id="projects"></section>

        <div class="row gx-0 mb-4 mb-lg-5 mt-4 mt-lg-5 align-items-center div-info">
            <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="complements/correr.png" alt="..." />
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="featured-text text-center text-lg-left div-info-text">
                
                    <h4>Bienvenidos</h4>
                    <p class="text-black-50 mb-0">Pagina oficial del club Eventos Deportivos!! Bienvenido, esperemos que
                        disfrute la estancia en nuestra paginaWeb
                    </p>
                </div>
            </div>
        </div>
        </section>
    </div>
    <!-- Tarjetas de deportes -->
    <div class="container py-3 principal">
        <section class="projects-section bg-light" id="projects"></section>

        <div class="row gx-0 mb-4 mb-lg-5 mt-4 mt-lg-5 align-items-center div-info">
            <div class="col-xl-4 col-lg-5">
                <div class="featured-text text-center text-lg-left div-info-text">
                    <h4>Eventos Deportivos</h4>
                    <p class="text-black-50 mb-0">Aquí puedes apuntarte a cualquien evento una vez que te hayas
                        registrado, haciendo posible la creacion de nuevos eventos
                    </p>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="complements/CentroDeportivo.png"
                    alt="..." />
            </div>
        </div>
        </section>
    </div>
    <!--Cartas-->
    <div class="container" id="addsaf">
        <div class="text-center">
            <h2 class="section-heading">Section Deportivo</h2>
            <h4 class="Seccion-subheading text-muted mb-5 mt-3">Aqui estan algunos de los deportes que se practica en el
                Club.</h4>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                <div class="card text-center text-bg-light mb-3 border-dark mb-3" style="width: 20rem;">
                    <img src="complements/football.jpeg" class="img-fluid">
                    <div class="card-body">
                        <h5 class="card-title">Fútbol</h5>
                        <p class="card-text">Eventos de Fútbol</p>
                        <button type="button" class="btn btn-danger" onClick="cargar_pagina_deporte('futbol')">Entrar</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                <div class="card text-center text-bg-light mb-3 border-dark mb-3" style="width: 20rem;">
                    <img src="complements/basketball.jpg" class="img-fluid">
                    <div class="card-body">
                        <h5 class="card-title">Baloncesto</h5>
                        <p class="card-text">Eventos de Baloncesto</p>
                        <button type="button" class="btn btn-danger" onClick="cargar_pagina_deporte('baloncesto')">Entrar</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                <div class="card text-center text-bg-light mb-3 border-dark mb-3" style="width: 20rem;">
                    <img src="complements/swiming.jpg" class="img-fluid">
                    <div class="card-body">
                        <h5 class="card-title">Natación</h5>
                        <p class="card-text">Eventos de Natación</p>
                        <button type="button" class="btn btn-danger" onClick="cargar_pagina_deporte('natacion')">Entrar</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                <div class="card text-center text-bg-light mb-3 border-dark mb-3" style="width: 20rem;">
                    <img src="complements/Tennis.jpg" class="img-fluid">
                    <div class="card-body">
                        <h5 class="card-title">Tenis</h5>
                        <p class="card-text">Eventos de Tenis</p>
                        <button type="button" class="btn btn-danger" onClick="cargar_pagina_deporte('tenis')">Entrar</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                <div class="card text-center text-bg-light mb-3 border-dark mb-3" style="width: 20rem;">
                    <img src="complements/atletismo.jpg" class="img-fluid">
                    <div class="card-body">
                        <h5 class="card-title">Atletismo</h5>
                        <p class="card-text">Eventos de Atletismo</p>
                        <button type="button" class="btn btn-danger" onClick="cargar_pagina_deporte('atletismo')">Entrar</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                <div class="card text-center text-bg-light mb-3 border-dark mb-3" style="width: 20rem;">
                    <img src="complements/boleibol.jpg" class="img-fluid">
                    <div class="card-body">
                        <h5 class="card-title">Voleibol</h5>
                        <p class="card-text">Eventos de Voleibol</p>
                        <button type="button" class="btn btn-danger" onClick="cargar_pagina_deporte('voleibol')">Entrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    <!-- Footer-->
    <div class="mt-5">
        <footer class="text-white text-center text-lg-start bg-dark">
            <div class="container p-4">
                <div class="row mt-4">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-4">CONÓCENOS</h5>
                        <ul class="fa-ul" style="margin-left: 1.65em;">
                            <li class="mb-3">
                                <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">C. Tajo, s/n,
                                    28670 Villaviciosa de Odón, Madrid</span>
                            </li>
                            <li class="mb-3">
                                <span class="fa-li"><i class="fas fa-envelope"></i></span><span
                                    class="ms-2">uemsportevents@gmail.com</span>
                            </li>
                            <li class="mb-3">
                                <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2"> 917 407
                                    272</span>
                            </li>
                        </ul>
                        <div class="mt-4 icon-insta">
                            <!-- logo Instagram -->
                            <a type="button" class="btn btn-floating btn-light btn-lg"
                                href="https://www.instagram.com/uem_sportevents/" target="_blank"><i
                                    class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <img src="complements/Localizacion.png" width="500px">
                        <p> <a href="https://www.google.com/maps/place/Universidad+Europea+de+Madrid+(Campus+Villaviciosa+de+Od%C3%B3n)/@40.3730607,-3.9212715,17z/data=!3m1!4b1!4m5!3m4!1s0xd419031a94d45e5:0x375a8b6ca7a1dc4c!8m2!3d40.3730607!4d-3.9190828"
                                target="_blank"> Como llegar </a></p>
                    </div>
                </div>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © Universidad Europea:
                <a class="text-white" href="https://vidauniversitaria.universidadeuropea.com/clubs/details/863">Club
                    deportivo</a>
            </div>
        </footer>
        <script src="bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
        <script src="bootstrap-5.2.3-dist/js/jquery-3.6.3.min.js"></script>
        <script>
            function cargar_pagina_deporte(deporte){
            // conectar con evento.php por medio de ajax
            
            jQuery.ajax({
                type: "POST",
                url: 'intermedio.php',
                data: {deporte: deporte},
                success: function (response) {
                    // cargar la pagina de eventosa
                    console.log(response)
                }
                // cargar la pagina de eventos sin ajax
                
            });
            window.location.href = "evento.php";
            }
            

        </script>
    </div>
</body>
</html>