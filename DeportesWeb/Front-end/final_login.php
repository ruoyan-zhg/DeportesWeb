<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


	define("DB_SERVER", "localhost");
    // usuario utilizado en la base de datos
	define("DB_USER", "root");
	define("DB_PASS", "");
    //nombre de la base de datos 
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
?>
<?php 




	
?>
<?php

if(isset($_POST['username'])) { 
    // check if the username has been set
	$username = $_POST["username"];
    $username = (int)$username;
}
if(isset($_POST['password'])) { 
    // check if the username has been set
    $password = $_POST["password"];
    $password = (int) $password;
    #$password = password_hash($password, PASSWORD_DEFAULT);
}

$safe_username = mysqli_real_escape_string($connection, $username);

$query  = "SELECT * ";
$query .= "FROM usuario ";
$query .= "WHERE usuario.id_usuario = $username";
$query .= " LIMIT 1;";


$user_set = mysqli_query($connection, $query);
#echo $user_set["id_usuario"];
if ($user_set) {
    // success
    $user = mysqli_fetch_assoc($user_set);
    if ($user) {
        // Success
        $contrase = password_verify($password, $user["contrasenia"]);
        echo $contrase;
        if(password_verify($password, $user["contrasenia"])){
            $_SESSION["id_usuario"] = $user["id_usuario"];
            header("Location: " . "index.html");
        }
        else{
            header("Location: " . "error_login.php");
        }
        
    }
}else {
    die("Database query failed.");
} 



?>

<?php
    // 5. Close database connection
    mysqli_close($connection);
?>