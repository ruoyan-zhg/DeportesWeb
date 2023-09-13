<?php
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
	
	
if(isset($_POST['titulo'])) { 
    // check if the username has been set
	$titulo = $_POST["titulo"];
}
if(isset($_POST['descripcion'])) { 
    // check if the username has been set
	$descripcion = $_POST["descripcion"];
}
if(isset($_POST['deporte'])) { 
    // check if the username has been set
	$deporte = $_POST["deporte"];
}
if(isset($_POST['localizacion'])) { 
    // check if the username has been set
	$localizacion = $_POST["localizacion"];
}
if(isset($_POST['fecha'])) { 
    // check if the username has been set
	$fecha = $_POST["fecha"];
}
if(isset($_POST['participantes'])) { 
    // check if the username has been set
	$participantes = $_POST["participantes"];
}
if(isset($_POST['imagen'])) { 
    // check if the username has been set
	$imagen = $_POST["imagen"];
}

function insertarImagen($imagen){
    $nombre = $imagen['name'];
    $tipo = $imagen['type'];
    $tamano = $imagen['size'];
    $tmp = $imagen['tmp_name'];
    $error = $imagen['error'];
    $carpeta = 'complements/';
    $destino = $carpeta.$nombre;
    if($error == 0){
        if($tamano <= 1000000){
            if($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png'){
                if(move_uploaded_file($tmp, $destino)){
                    return $destino;
                }else{
                    return 'Error al subir la imagen';
                }
            }else{
                return 'El formato de la imagen no es correcto';
            }
        }else{
            return 'El tamaño de la imagen es demasiado grande';
        }
    }else{
        return 'Error al subir la imagen';
    }
}/*
$file = $_FILES['imagen'];
$fileName = $_FILES['imagen']['name'];
$fileTmpName = $_FILES['imagen']['tmp_name'];
$fileSize = $_FILES['imagen']['size'];
$fileError = $_FILES['imagen']['error'];
$fileType = $_FILES['imagen']['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png');*/
/*
if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
        if ($fileSize < 100000) {
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'complements/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            if ($fileActualExt)
            $new_png_img = 'user_image.png';
            $png_img = imagepng(imagecreatefromjpeg($_FILES['user_image']['tmp_name']), $new_png_img);
            imagepng(imagecreatefromstring(file_get_contents($filename)), "tenis_evento_2.png");
        } else {
            echo "Your file is too big!";
        }
    } else {
        echo "There was an error uploading your file!";
    }
} else {
    echo "You cannot upload files of this type!";
}*/





echo "descripcion: ".$descripcion;
echo "deporte: ".$deporte;
echo "localizacion: ".$localizacion;
echo "fecha: ".$fecha;
echo "participantes: ".$participantes;
echo "titulo: ".$titulo;
$imagen = insertarImagen($_FILES['imagen']);

$query  = "INSERT INTO evento (";
$query .= "  titulo, descripcion, deporte, localizacion, fecha, participantes, imagen";
$query .= ") VALUES (";
$query .= "  '{$titulo}', '{$descripcion}', '{$deporte}', '{$localizacion}', '{$fecha}', '{$participantes}', '{$imagen}'";
$query .= ")";
$result = mysqli_query($connection, $query);
if ($result) {
  // Success
  // redirect_to("somepage.php");
    echo "Evento creado";
    //echo insertarImagen($_FILES['imagen']);

} else {
  // Failure
  // $message = "Subject creation failed";
    die("Database query failed. " . mysqli_error($connection));
}

?>
