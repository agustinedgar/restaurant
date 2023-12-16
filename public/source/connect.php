<?php
	// //server connect 
	// $conectar=@mysql_connect('localhost','root','rooot');
	// //verify connection
	// if(!$conectar){
	// 	echo"No Se Pudo Conectar Con El Servidor";
	// }else{

	// 	$base=mysql_select_db('reservation');
	// 	if(!$base){
	// 		echo"No Se Encontro La Base De Datos";			
	// 	}
	// }
	// $nombre=$_POST['nombre'];
	// $correo=$_POST['correo'];
    // $sucursal=$_POST['sucursal']
	// $mensaje=$_POST['mensaje'];
	// //update
	// $sql="INSERT INTO datos VALUES('$nombre',
	// 							   '$correo',
    //                                $sucursal,
	// 							   '$mensaje')";
	// // sql  execute
	// $ejecutar=mysql_query($sql);
	// //verify connection
	// if(!$ejecutar){
	// 	echo"Hubo Algun Error";
	// }else{
	// 	echo"Datos Guardados Correctamente<br><a href='index.html'>Volver</a>";
	// }


	// server connect
$conectar = @mysql_connect('localhost:3306', 'root', 'Eddedi24.');
// verify connection
if (!$conectar) {
    die("No se pudo conectar con el servidor: " . mysql_error());
}

$base = mysql_select_db('reservation');
// verify if the database was selected successfully
if (!$base) {
    die("No se encontró la base de datos: " . mysql_error());
}

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$sucursal = $_POST['sucursal']; // Agregar punto y coma al final
$mensaje = $_POST['mensaje'];

// Evitar la inyección SQL escapando las variables
$nombre = mysql_real_escape_string($nombre);
$correo = mysql_real_escape_string($correo);
$sucursal = mysql_real_escape_string($sucursal);
$mensaje = mysql_real_escape_string($mensaje);

// update
$sql = "INSERT INTO datos (nombre, correo, sucursal, mensaje) VALUES ('$nombre', '$correo', '$sucursal', '$mensaje')";

// sql execute
$ejecutar = mysql_query($sql);

// verify connection
if (!$ejecutar) {
    die("Hubo un error: " . mysql_error());
} else {
    echo "Datos guardados correctamente<br><a href='index.html'>Volver</a>";
}

// Cierra la conexión a la base de datos al final del script
mysql_close($conectar);

?>