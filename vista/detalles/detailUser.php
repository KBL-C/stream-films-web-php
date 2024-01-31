<?php
require("../../controlador/userController.php");
class DetailUser{
    
    public function __construct(){

    }

    //vista para detalle de usuario por nick
    function printUserByNick($user){

        echo "<div id=\"backdetalle\">";
            echo "<div id=\"usuarioDetalle\" class=\"usuarioDetalle\">";
                echo "<h1>User details</h1>";
                echo "<p><img  id=\"perfil\" src=".$user->getAvatarUrl()." class=\"img\" width=\"400\" height=\"300\"></p>";
                echo "<p>Nick: ".$user->getNick()." </p>";
                echo "<p>Email: ".$user->getEmail()."</p>";
                echo "<p>Numero de peliculas Favoritas: ".$user->getFavmovies()." </p>";//hacer una vista en la bd para scar estos datos count(userfavmovie.movieid)
            echo "</div>";
        echo "</div>";


    }
    //vista para la lista de pelis favs del usuario
    function printfavMovieList($favMovieList){
        foreach($favMovieList as $favmovie){
            //echo "<div class=\"articulo\">";
            echo "<div class=\"cont\">";
                echo "<img class=\"img\"  src=\"".$favmovie->getPosterurl()."\" width=\"400\" height=\"300\">";
                echo "<p>".$favmovie->getName()."</p>";
                echo "<p>Rating: ".$favmovie->getAveragerating()."</p>";
            echo "</div>";
        }

    }
   
}

?>