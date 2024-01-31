<?php
require("../../controlador/movieController.php");
class DetaileMovie{
    
    public function __construct(){

    }

    #vista para el detalle de la película
    function printMovieByPublicid($movie){

        echo "<div id=\"ppeli\">";
            echo "<div id=\"peli\" class=\"peli\">";
                //echo "<h1>Movie details</h1>";
                echo "<p><img src=".$movie->getPosterurl()." class=\"img\" width=\"400\" height=\"300\"></p>";
                echo "<p>Name: ".$movie->getName()." </p>";
                echo "<p>Synopsis: ".$movie->getSynopsis()."</p>";
                echo "<p>ReleaseYear: ".$movie->getReleaseyear()."</p>";
                echo "<p>Director: ".$movie->getDirectorname()."</p>";
                echo "<p>Average rating: ".$movie->getAveragerating()."</p>";
               
                echo "<form action=\"../../controlador/formularios/deleteMovie.php\"><button type=\"submit\"  class=\"btnenviarUsuario\" name=\"eliminar\" value=".$movie->getPublicid().">delete</button></form>";


            echo "</div>";
        echo "</div>";

    }


    #vista para la lista de comentarios
    function printUserCommentList($userCommentList){
        foreach($userCommentList as $userComment){
            //echo "<div class=\"articulo\">";
            //echo "<div class=\"cont\">";
            echo "<div id=\"pcomment\">";
                echo "<div id=\"peliComment\" class=\"peliComment\">";
                    echo "<img class=\"img\"  src=\"".$userComment->getAvatarurl()."\" width=\"100\" height=\"80\">";
                    echo "<p>".$userComment->getNick()."</p>";
                    echo "<p>".$userComment->getComment()."</p>";
                    echo "<p>".$userComment->getCommentdate()."</p>";
                echo "</div>";   
            echo "</div>";
        }
    }



   
}

?>
