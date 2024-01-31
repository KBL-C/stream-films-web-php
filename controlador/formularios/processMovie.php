<?php
require("../movieController.php");

//recogemos los datos de la peli del formulario insertar
$moviePublicid = $_POST['pid'];
$movieName = $_POST['nombre'];
$movieYear = $_POST['anio'];
$movieDirector = $_POST['director'];
$movieFoto = $_POST['urlm'];
$movieSypnosis =$_POST['textarea'];

//creamos la conexion
$myConnection = new MovieController();
//comprobación de datos:
if($moviePublicid=="" || $movieName=="" || is_null($movieYear) || $movieDirector=="" || $movieSypnosis==""){
    header("Location: http://localhost/Proyecto_Raffinity/vista/addMovie.html");
   
}else{
    //insertamos la peli
    $myConnection->setMovie($moviePublicid, $movieName, $movieSypnosis, $movieYear, $movieDirector, $movieFoto);
    header("Location: http://localhost/Proyecto_Raffinity/vista/index.php");
}


?>