<?php
require("../movieController.php");
//obtenemos la id publica
$publicid=$_GET['eliminar'];

$myConnection = new MovieController();
//eliminamos peli
$myConnection->removeMovieBypublicid($publicid);
header("Location: http://localhost/Proyecto_Raffinity/vista/index.php");


?>