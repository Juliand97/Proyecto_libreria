<?php
// Recibe los datos enviados desde html
$a=$_POST["no_registro"];
$b=$_POST["nombrea"];
$c=$_POST["apellidoa"];
$d=$_POST["nac"];
$e=$_POST["fechan"];
$f=$_POST["estadoa"];
$g=$_POST["obras"];


echo $a."<br>";
echo $b."<br>";
echo $c."<br>";
echo $d."<br>";
echo $e."<br>";
echo $f."<br>";
echo $g."<br>";

//CONEXI�N A LA BASE DE DATOS
//Datos de conexi�n
$hostname_db = "localhost";
$database_db = "libreria";
$username_db = "root";
$password_db = "";
// Creaci�n del Objeto y entregando los datos a los atributos
// Se crea el objeto Z de la clase mysql
$z = new mysqli($hostname_db, $username_db, $password_db,$database_db);
// Se verifica si hay alg�n erro en la conexion

if ($z->connect_errno) {
    printf("Fallo en la conexion a la base de datos: %s\n", $a->connect_error);
    exit();
}
// Consulta en SQL
$query = "UPDATE `autores` set `nombrea`='$b',`apellidoa`='$c',`nac`='$d',`fechan`='$e',`estadoa`='$f',`obras`='$g'  where no_registro='$a'";
$z->query($query);
//echo $z;
echo "<script> alert ('Registro actualizado')
		window.location.replace('5reportehtmlqli.php')</script>";
?>