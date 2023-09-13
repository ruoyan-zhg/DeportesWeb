<?php
    
    // iniciar sesion
    session_start();
    $_SESSION["id_usuario"] = 2;
    $_SESSION['deporte'] = "futbol";

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
    function creartarjeta($row, $numero, $connection){
        // comprueba si el usuario esta logeado
        if (isset($_SESSION['id_usuario'])){
            $id_usuario = $_SESSION['id_usuario'];
            $id_evento = $row["id_evento"];
            // si esta logeado se comprueba si esta inscrito en el evento
            $inscrito = consultar_inscripcion($id_evento, $id_usuario, $connection);
        
            if($inscrito){
                echo mostrar_informacion($row, $numero, true);
            }
            else{
                echo mostrar_informacion($row, $numero, false);
            }
        }
        echo mostrar_tarjeta($row, $numero);

    }
    function consultar_inscripcion($id_evento, $id_usuario, $connection){
        $query = "SELECT * FROM participante WHERE id_evento = '{$id_evento}' AND id_usuario = '{$id_usuario}'";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("La consulta ha fallado");
        }
        if(mysqli_fetch_assoc($result)){
            return true;
        }
        return false;
    }
    function mostrar_tarjeta($row, $numero){
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
    function mostrar_informacion($row, $num_tarjeta, $inscrito){
        if ($inscrito == true){
            $boton_inscripcion = "Darse de baja";
        }
        else{
            $boton_inscripcion = "Inscribirse";
        }
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
                                <p> '.$row['participantes'].'</p>
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
                    <button type="button" class="btn btn-danger" onClick="clickMe('.$row['id_evento'].')">'.$boton_inscripcion.'</button>
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
}
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

    <header class="natacion" id="imagenGrande">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center bg-opacity-75 bg-light p-5">
                <div class="text-center">
                    <h1 class="text-danger mx-auto my-0 text-uppercase" id="titulo">Eventos de natación</h1>
                    
                    <!-- <?php echo "<h2 class='text-black-50 mx-auto mt-2s' id='subtitulo'>" . $row["deporte"] . "</h2>"; ?> --> 
                    <h2 class="text-black-50 mx-auto mt-2s" id="subtitulo">Organizamos torneos de natación en interior y exterior</h2>
                </div>
            </div>
        </div>
    </header>

    <!-- ======= evento Section ======= -->
    <section id="evento" class="evento">
        <div class="container" data-aos="fade-up">

            <div class="section-title mt-4">
                
                <h2>Eventos</h2>
                <p id="miniDes">Torneos de velocidad, resistencia, estilos combinados</p>
            </div>

            <div class="row evento-container" data-aos="fade-up" data-aos-delay="200">
                <?php
                    // cargo los eventos de la base de datos del deporte seleccionado
                    $result = cargar_deporte($_SESSION['deporte'], $connection);

                    $eventos = array();
                    $numero = 0;
                    while($row = $result->fetch_assoc()){
                        creartarjeta($row, $numero, $connection);
                        //echo $n_tarjeta;
                        $numero++;
                        
                    }
                    if ($numero == 0){
                        echo "<h1>No hay eventos</h1>";
                    }
                
                ?>
                <div class="col-lg-4 col-md-6 evento-item filter-web">
                    <div class="evento-wrap" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        <img id="1" src="complements/como-nadar-estilo-mariposa.png"  class="img-fluid" alt="">
                        <div class="evento-info">
                            <h4 id="nombreEven1">Estilo Mariposa 100 metros</h4>
                            <p id="fecha1">12 Enero 2022</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 evento-item filter-web">
                    <div class="evento-wrap" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                        <img id="2" src="complements/velocidad.png" class="img-fluid" alt="" >
                        <div class="evento-info">
                            <h4 id="nombreEven2">Torneo velocidad 50 metros</h4>
                            <p id="fecha2">14 Enero 2022</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 evento-item filter-app">
                    <div class="evento-wrap" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                        <img id="3" src="complements/brazada.png" class="img-fluid" alt="">
                        <div class="evento-info">
                            <h4 id="nombreEven3">Torneo brazada 100 metros</h4>
                            <p id="fecha3">14 Enero 2022</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <!--pagina informacion de evento:
        titulo, yes
        descripcion, yes
        imagen,yes
        numero de participantes inscritos,
        fecha,
        lugar,
        boton para inscribirse,
        boton que aparece cuando estas inscrito para desincribirse 
    -->
    <div class="modal fade modal-xl" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
        
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Estilo Mariposa 100 metros</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row g-0" >
                <div class="col">
                <div class="card" style="width: 18rem;">
                <img src="complements/como-nadar-estilo-mariposa.png" class="card-img-top">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <p>Nº Participantes: </p>
                        </div>
                        <div class="col">
                            <p>Fecha: </p>
                        </div>
                        <div class="col">
                            <p>Lugar: </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                </div>
                </div>
                <div class="col">
                    <p id="texto">Texto de descripcion del Evento </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Inscribirse</button>
            </div>
        </div>
    </div>

</div>


    
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
        <script>
            function clickMe(id_evento){
                document.cookie = "idEvento=" + id_evento;
                printCookies();
                <?php
                    $id_evento = $_COOKIE['idEvento'];
                    $id_usuario = $_SESSION['id_usuario'];
                    // create participante on database
                    $sql = "INSERT INTO participante";
                    $sql .= "(id_usuario, id_evento) VALUES ($id_usuario, $id_evento)";
                    echo $sql;
                    $result = mysqli_query($connection, $sql);
                    if ($result) {
                        echo "Participante creado correctamente";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                ?>
            }
            function printCookies(){
                var theCookies = document.cookie.split(';');
                var aString = '';
                for (var i = 1 ; i <= theCookies.length; i++) {
                    aString += i + theCookies[i-1] + "\n";
                }
                console.log(aString);
            }
        </script>
</body>

</html>