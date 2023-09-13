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
                    <li class="nav-item items"><a class="nav-link" href="#evento">Eventos</a></li>
                    <li class="nav-item items"><a class="nav-link" href="#services">Deportes</a></li>
                    <li class="nav-item items"><a class="nav-link" href="#signup">Unirse al club</a></li>
                    <li class="nav-item items"><a class="nav-link" href="#signup"><img src="complements/user.png" height="25px" width="25px"></a></li>
                </ul>
            </div>
        </div>
    </nav>




    <section class="text-center">
            
        <div class="p-5 bg-image" id="image-login"></div>
        

        <div class="card mx-4 mx-md-5 shadow-5-strong" id="card-form-login">
            <div class="card-body py-5 px-md-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Crear evento</h2>
                        <form action="crear_evento.php" method="POST" enctype="multipart/form-data">
                            
                            <!-- titulo input -->
                            <div class="form-outline mb-4">
                                <input name="titulo" type="text" id="titulo-create-event" class="form-control" placeholder="Torneo Tenis" />
                                <label class="form-label" for="title">Título del evento</label>
                            </div>
                            
                            <!-- Descripcion user input -->
                            <div class="form-outline mb-4">
                                <textarea name="descripcion" class="form-control" aria-label="With textarea" placeholder="Escribe aquí información del evento"></textarea>
                                <label class="form-label" for="description">Descripción</label>
                            </div>
                            <!-- deporte user input -->
                            <div class="form-outline mb-4">
                                <div class="input-group">
                                    <select name="deporte" class="form-select" id="inputGroupSelect02">
                                        <option selected>Elige un deporte...</option>
                                        <option value="futbol">Fútbol</option>
                                        <option value="tenis">Tenis</option>
                                        <option value="baloncesto">Baloncesto</option>
                                        <option value="baloncesto">Natación</option>
                                        <option value="voleibol">Voleibol</option>
                                        <option value="atletismo">Atletismo</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                    <button class="btn btn-outline-secondary" type="button">Añadir distinto</button>
                                </div>
                                <label class="form-label" for="sport">Deporte</label>
                            </div>
                            
                            <!-- location user input -->
                            <div class="form-outline mb-4">
                                <input name="localizacion" type="text" id="Localizacion-create-event" class="form-control" placeholder="Lugar en el que se realizará" />
                                <label class="form-label" for="location">Localización</label>
                            </div>
                            
                            <!-- date user input -->
                            <div class="form-outline mb-4">
                                <input name="fecha" type="datetime-local" id="date-create-event" class="form-control" />
                                <label class="form-label" for="date">Fecha</label>
                            </div>

                            <!-- participants user input -->
                            <div class="form-outline mb-4">
                                <input name="participantes" type="number" id="participants-create-event" class="form-control" min="2" />
                                <label class="form-label" for="number">Número de participantes</label>
                            </div>

                            <!-- Imagen evento input -->
                            <div class="form-outline mb-4">
                                <input name="imagen" type="file" id="image-create-event" class="form-control" accept=".png" />
                                <label class="form-label" for="img">Imagen que se mostrará del evento</label>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-secondary btn-block mb-4 me-8">
                                        Cancelar
                                    </button>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-danger btn-block mb-4">
                                        Crear
                                    </button>
                                </div>
                            </div>
                            
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <div class="my-5">
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
</body>