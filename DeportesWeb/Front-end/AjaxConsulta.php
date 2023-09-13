<?php

    // iniciar sesion
    session_start();
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
        echo "no se conecto a la base de datos";
    }
// comprobar que se reciben los datos en un solo if 
if(isset($_POST['idEvento']) && isset($_POST['idUsuario'])) { 
    // check if the username has been set
    $id_evento = $_POST["idEvento"];
    $id_usuario = $_POST["idUsuario"];

    if(consultar_inscripcion($id_evento, $id_usuario, $connection)){
        // ya está inscrito por lo que hay que borrarlo
        $query = "DELETE FROM participante WHERE id_evento = '{$id_evento}' AND id_usuario = '{$id_usuario}'";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("La consulta ha fallado");
            echo "no se borro";
        }else{
            echo "se borro";
        }
    }else{
        // no está inscrito por lo que hay que insertarlo
        $query = "INSERT INTO participante (id_evento, id_usuario) VALUES ('{$id_evento}', '{$id_usuario}')";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("La consulta ha fallado");
            echo "no se inserto";
        }
        else{
            echo "se inserto";
        }
    }
}
function consultar_inscripcion($id_evento, $id_usuario, $connection){
    $query = "SELECT * FROM participante WHERE id_evento = '{$id_evento}' AND id_usuario = '{$id_usuario}'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("La consulta ha fallado");
        echo "no se consulto la inscripcion";
    }
    if(mysqli_fetch_assoc($result)){
        return true;
    }
    return false;
}

// Oscar Gonzalez 22081665 22081665@live.uem.es
// Ramon Perez 22084550 22084550@live.uem.es
// Jose Manuel 22084820 22084820@live.uem.es
// Maria Fernandez 22089632 22089632@live.uem.es
// Ruben Garcia 22089633 22089633@live.uem.es
// Ortencio Rodriguez 22089634 22089634@live.uem.es




?>