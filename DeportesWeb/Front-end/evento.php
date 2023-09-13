<?php
    
    // iniciar sesion
    
    session_start();
    //$_SESSION["id_usuario"] = 2;
    echo $_SESSION["id_usuario"];
    //$_SESSION['deporte'] = "tenis";
    $deporte = $_SESSION['deporte'];
    echo $deporte;

	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "web_deporte");

    // 1. Crear conexión con la BBDD
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Test if connection succeeded
    if(mysqli_connect_errno()) {
    die("La conexión con la BBDD ha fallado: " . 
        mysqli_connect_error() . 
        " (" . mysqli_connect_errno() . ")"
        );
    }
    
    switch($deporte){
        case "futbol":
            $deporte_titulo = "Fútbol";
            $deporte_subtitulo = "Organizamos torneos de natación en interior y exterior";
            $deporte_descripcion = "jugamos futbol"; 
            break;
        case "baloncesto":
            $deporte_titulo = "Baloncesto";
            $deporte_subtitulo = "Organizamos torneos de baloncesto en interior y exterior";
            $deporte_descripcion = "jugamos baloncesto";
            break;
        case "tenis":
            $deporte_titulo = "Tenis";
            $deporte_subtitulo = "Organizamos torneos de tenis en interior y exterior";
            $deporte_descripcion = "jugamos tenis";
            break;
        case "atletismo":
            $deporte_titulo = "Atletismo";
            $deporte_subtitulo = "Organizamos torneos de atletismo en interior y exterior";
            $deporte_descripcion = "jugamos atletismo";
            break;
        case "natacion":
            $deporte_titulo = "Natación";
            $deporte_subtitulo = "Organizamos torneos de natación en interior y exterior";
            $deporte_descripcion = "jugamos natacion";
            break;
        case "voleibol":
            $deporte_titulo = "Voleibol";
            $deporte_subtitulo = "Organizamos torneos de voleibol en interior y exterior";
            $deporte_descripcion = "jugamos voleibol";
            break;
    }


    // funcion para cargar eventos de el deporte seleccionado en la pagina index
    function cargar_deporte($deporte, $connection){
        // consulta de los eventos de el deporte seleccionado
        $query = "SELECT * FROM evento WHERE deporte = '{$deporte}'";
        // almacenar la consulta en una variable
        $result = mysqli_query($connection, $query);
        // comprobar si la consulta ha fallado
        if(!$result){
            die("La consulta ha fallado");
        }
        return $result;
    }
    
    /*
        crea la tarjeta de el evento, para crear la tarjeta se utiliza el numero de evento
        y muestra la informacion del evento dependiendo de si el usuario esta inscrito o no
    */
    function creartarjeta($row, $connection){
        // comprueba si el usuario esta logeado
        if (isset($_SESSION['id_usuario'])){
            $id_usuario = $_SESSION['id_usuario'];
            $id_evento = $row["id_evento"];
            // si esta logeado se comprueba si esta inscrito en el evento
            $inscrito = consultar_inscripcion($id_evento, $id_usuario, $connection);
            // se consulta el numero de inscritos en el evento
            $num_inscritos = consultar_num_inscritos($id_evento, $connection);
            // si esta inscrito se muestra la informacion del evento con el boton de desinscribirse
            if($inscrito){
                echo mostrar_informacion($row, $id_evento, true, $num_inscritos);
            }
            // si no esta inscrito se muestra la informacion del evento con el boton de inscribirse
            else{
                echo mostrar_informacion($row, $id_evento, false, $num_inscritos);
            }
        }
        // muestra cada tarjeta que es lo mismo que cada evento
        echo mostrar_tarjeta($row, $id_evento);
    }
    function consultar_num_inscritos($id_evento, $connection){
        // consulta para comprobar el numero de inscritos en el evento
        $query = "SELECT COUNT(*) FROM participante WHERE id_evento = '{$id_evento}'";
        // almacenar la consulta en una variable
        $result = mysqli_query($connection, $query);
        // comprobar si la consulta ha fallado
        if(!$result){
            die("La consulta ha fallado");
        }
        // almacenar el resultado de la consulta en una variable
        $row = mysqli_fetch_assoc($result);
        // almacenar el numero de inscritos en una variable
        $num_inscritos = $row["COUNT(*)"];
        return $num_inscritos;
    }
    // funcion para comprobar si el usuario esta inscrito en el evento
    function consultar_inscripcion($id_evento, $id_usuario, $connection){
        // consulta para comprobar si el usuario esta inscrito en el evento
        $query = "SELECT * FROM participante WHERE id_evento = '{$id_evento}' AND id_usuario = '{$id_usuario}'";
        // almacenar la consulta en una variable
        $result = mysqli_query($connection, $query);
        // comprobar si la consulta ha fallado
        if(!$result){
            die("La consulta ha fallado");
        }
        // si la consulta devuelve un resultado es que el usuario esta inscrito en el evento
        if(mysqli_fetch_assoc($result)){
            return true;
        }
        // si no devuelve un resultado es que el usuario no esta inscrito en el evento y por lo tanto devuelve false
        return false;
    }
    // funcion para mostrar cada tarjeta que es lo mismo que cada evento
    function mostrar_tarjeta($row, $numero){
        // crea la tarjeta con la informacion del evento
        $tarjeta = "<div class='col-lg-4 col-md-6 evento-item filter-web'>
            <div class='evento-wrap' data-bs-toggle='modal' data-bs-target='#staticBackdrop".$numero."'>
                <img id='1' src='".$row['imagen']."'  class='img-fluid' alt=''>
                <div class='evento-info'>
                    <h4 id='nombreEven".$numero."'>" . $row["titulo"] . "</h4>
                    <p id='fecha".$numero."'>" . $row["fecha"] . "</p>
                    <p id='id".$numero."'>" . $row["id_evento"] . "</p>
                </div>
            </div>
        </div>";
        return $tarjeta;
    }
    // funcion para mostrar la informacion del evento
    function mostrar_informacion($row, $num_tarjeta, $inscrito, $num_inscritos){
        // si el usuario esta inscrito en el evento se muestra la informacion del evento con el boton de desinscribirse
        if ($inscrito == true){
            $boton_inscripcion = "Darse de baja";
        }
        // si el usuario no esta inscrito en el evento se muestra la informacion del evento con el boton de inscribirse
        else{
            $boton_inscripcion = "Inscribirse";
        }
        // crea la informacion del evento
        $informacion = '
        <div class="modal fade modal-xl" id="staticBackdrop'.$num_tarjeta.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
            
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">'.$row['titulo'].'</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row g-0" >
                    <div class="col">
                    <div class="card" style="width: 30rem;">
                    <img src="'.$row['imagen'].'" class="card-img-top">
                    <div class="container mt-3">
                        <div class="row justify-content">
                            <div class="col-md-auto">
                                <p>Nº Participantes:</p>
                            </div>
                            <div class="col-md-auto" id="participantes">
                                <p id="numeroInscritos'.$num_tarjeta.'"> '.$num_inscritos.'/'.$row['participantes'].'</p>
                            </div>
                        </div>
                        <div class="row justify-content">
                            <div class="col-md-auto">
                                <p>Fecha: </p>
                            </div>
                            <div class="col-md-auto" id="fecha">
                                <p> '.$row['fecha'].' </p>
                            </div>
                        </div>
                        <div class="row justify-content">
                            <div class="col-md-auto">
                                <p>Lugar: </p>
                            </div>
                            <div class="col-md-auto" id="lugar">
                                <p>'.$row['localizacion'].' </p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col m-3 justify-content">
                    <p id="texto">'.$row['descripcion'].'</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="suscribirse'.$num_tarjeta.'" class="btn btn-danger" onClick="suscribirse('.$row['id_evento'].','.$_SESSION['id_usuario'].')">'.$boton_inscripcion.'</button>
                </div>
                </div>
            </div>
        </div>';
        return $informacion;
    }



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
                    <li class="nav-item items"><a class="nav-link" href="#evento">Eventos</a></li>
                    <li class="nav-item items"><a class="nav-link" href="#services">Deportes</a></li>
                    <li class="nav-item items"><a class="nav-link" href="#signup">Unirse al club</a></li>
                    <li class="nav-item items"><a class="nav-link" href="#signup"><img src="complements/user.png" height="25px" width="25px"></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="deporte_imagen <?php echo $deporte?>" id="imagenGrande">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center bg-opacity-75 bg-light p-5">
                <div class="text-center">
                    <h1 class="text-danger mx-auto my-0 text-uppercase" id="titulo">Eventos de <?php echo $deporte_titulo?></h1>
                    <h2 class="text-black-50 mx-auto mt-2s" id="subtitulo"><?php echo $deporte_subtitulo?></h2>
                </div>
            </div>
        </div>
    </header>

    <!-- ======= evento Section ======= -->
    <section id="evento" class="evento">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-4">
                <h2>Eventos</h2>
                <p id="miniDes"><?php echo $deporte_descripcion?></p>
            </div>
            <div class="row evento-container" data-aos="fade-up" data-aos-delay="200">
                <?php
                    // cargo los eventos de la base de datos del deporte seleccionado
                    $result = cargar_deporte($_SESSION['deporte'], $connection);
                    $eventos = array();
                    $numero = 0;
                    while($row = $result->fetch_assoc()){
                        creartarjeta($row, $connection);
                        //echo $n_tarjeta;
                        $numero++;
                    }
                    if ($numero == 0){
                        echo "<h1>No hay eventos</h1>";
                    }
                ?>
            </div>
        </div>
    </section><!-- End evento Section -->


    
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
        <!-- Scripts -->
        <script src="bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
        <script src="bootstrap-5.2.3-dist/js/jquery-3.6.3.min.js"></script>
        <script src ="bootstrap-5.2.3-dist/js/botones.js"></script>
</body>

</html>