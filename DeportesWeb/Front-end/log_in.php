
<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    header("location:index.php");

} else {
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sports event</title>
        <link href="complements/iconWeb.png" rel="icon">
        <link href="bootstrap-5.2.3-dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="bootstrap-5.2.3-dist/css/custom.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        
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
                
        
        <section class="text-center">
            
            <div class="p-5 bg-image" id="image-login"></div>
           

            <div class="card mx-4 mx-md-5 shadow-5-strong" id="card-form-login">
                <div class="card-body py-5 px-md-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="fw-bold mb-5">Iniciar sesión</h2>
                            <form action="final_login.php" method="post">

                                <!-- UEM user input -->
                                <div class="form-outline mb-4">
                                    <input type="text"  name="username" class="form-control" />
                                    <label class="form-label" for="form3Example3">Usuario universitario</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control" />
                                    <label class="form-label" for="form3Example4">Contraseña</label>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-secondary btn-block mb-4 me-8" onclick="location.href='sign_up.html';" >
                                            Registrarse
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-danger btn-block mb-4">
                                            Iniciar sesión
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <script src="bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
    </body>
</html>

<?php
}

?>
