<?php
    // iniciar sesion
    session_start();
    echo $_SESSION["id_usuario"];
    // si esta el deporte en la variable post que se guarde en la sesion
    if(isset($_POST["deporte"])){
        $_SESSION["deporte"] = $_POST["deporte"];
    }
?>