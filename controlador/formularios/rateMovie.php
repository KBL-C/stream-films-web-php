<?php
require_once("../movieController.php");
/**
 * recogemos los datos de la url y del formulario
 */
$rating = $_POST['ratingmovies'];
$publicid = $_POST['rm'];
//usuario constante
$userid = 3;

/*
$commentDate = new DateTime();
$commentDate->format('Y-m-d H:i:s');
*/

$myConnection = new MovieController();
//obtenemos la id privada de peli pasandole la pública
$movieid = $myConnection->getIdByPublicid($publicid);
//para comporbar si ya esite una puntuación y que no permita puntura más de una vez obtenemos la puntacion media de la peli
$movRating = $myConnection->getRatingByid($movieid);

//comprobación de datos:
if(is_null($movRating)){
    //en caso de que no exista puntuacion, se puntúa
    $myConnection->setRating($userid, $movieid, $rating);
    header("Location: http://localhost/Proyecto_Raffinity/vista/indexes/indexMovieDetail.php?moviePublicid=$publicid");
}else{
    //en caso de que esista puntuación, redirecciona sin puntuar a la misma página
    header("Location: http://localhost/Proyecto_Raffinity/vista/indexes/indexMovieDetail.php?moviePublicid=$publicid");
}


?>