<?php
require "../../controlador/movieController.php"; #Añado la librería de la clase ProductController

class MovieView{
    public function __construct(){

    }

    #Función que imprime una lista de peliculas
    public function printMovieList($movieList){
        foreach($movieList as $movie){
            //echo "<div class=\"articulo\">";
            echo "<div class=\"cont\">";
                echo "<a href=\"indexMovieDetail.php?moviePublicid=".$movie->getPublicid()."\"><img class=\"img\"  src=\"".$movie->getPosterurl()."\" width=\"300\" height=\"200\"></a>";
                echo "<p><a href=\"indexMovieDetail.php?moviePublicid=".$movie->getPublicid()."\">".$movie->getName()."</a></p>";
                echo "<p>ReleaseYear: ".$movie->getReleaseyear()."</p>";
                echo "<p>Rating: ".$movie->getAveragerating()."</p>";
                
            echo "</div>";
        }
    }

    #imprime las lista de pelis favoritas
    function printMovieByName($movieList){
        foreach($movieList as $movie){
            echo "<div class=\"cont\">";
                echo "<a href=\"indexMovieDetail.php?moviePublicid=".$movie->getPublicid()."\"><img class=\"img\"  src=\"".$movie->getPosterurl()."\" width=\"300\" height=\"200\"></a>";
                echo "<p><a href=\"indexMovieDetail.php?moviePublicid=".$movie->getPublicid()."\">".$movie->getName()."</a></p>";
                echo "<p>ReleaseYear: ".$movie->getReleaseyear()."</p>";
                echo "<p>Rating: ".$movie->getAveragerating()."</p>";
            echo "</div>";
        }
        
    }

}
?>