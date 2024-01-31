<?php
require("../movieController.php");
//recogemos el comentario
$comment = $_POST['textarea'];
//recogemos la id publica
$publicid = $_POST['pid'];

//pobemos el usuario fijo
$userid = 3;
/*
$commentDate = new DateTime();
$commentDate->format('Y-m-d H:i:s');
*/

$myConnection = new MovieController();

$movieid = $myConnection->getIdByPublicid($publicid);
//comprobación de datos:
if($myConnection->checkCommentLength($comment)==true){
    //insertamos el coemnatirio y rediccionamos ala misma página
    $myConnection->setComment($userid, $movieid, $comment);
    header("Location: http://localhost/Proyecto_Raffinity/vista/indexes/indexMovieDetail.php?moviePublicid=$publicid");
}else{
    header("Location: http://localhost/Proyecto_Raffinity/vista/index.php");
}

?>