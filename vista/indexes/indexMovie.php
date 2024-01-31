<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type">
        <meta content="text/html">
        <meta charset="utf-8">
        <title>html_pelis_raffinity</title>
        <link rel="stylesheet" type="text/css" href="../estilos/front_css.css">
    </head>
    <body>
        <header class="head">
            <a id="head" href="indexMovie.php">Raffinity</a>
            <form action="indexMovie.php" method="GET" autocomplete="off">
                <label for="buscar"></label><input type="text" name="buscador" id="buscar" placeholder="search movie by name" class="buscar">
                <button type="submit"  class="btnbuscar" name="button" value="buscar" >search</button>     
            </form>
        </header>
        <nav class="menu">
            <ul  id="backmenu">
                <li><a href="./indexMovie.php">Movies</a></li>
                <li><a href="../addMovie.html">Add movie</a></li>
                <li><a href="../addUser.html">Add users</a></li>
                <li id="btnusuarios"><a href="indexUser.php">Users</a></li>
            </ul>
        </nav>
        <h1 id="t1" class="t1">
            Movies
        </h1>
        <div id="full_cont_peli">

            <?php

            if (empty($_GET)){
                require_once("../vistas/movieView.php");
                /**creamos objeto movie controler, para poder llamar a todos los métodos que contiene
                 * 
                */
                $myConnection = new MovieController(); #Instancio un controlador (objeto ProductController)
                /**
                 * creamos objeto moviVie, la vista para visualizar todas las películas
                 */
                $myMovieView = new MovieView(); #Instancio un objeto ProductView
    
                $movieList=$myConnection->getAllMovies(); #Le pido al controlador todos los productos disponibles en BBDD
                //llamamos al métod imprimir pelis de la vista de pelíclas
                $myMovieView->printMovieList($movieList); #Muestro todos los productos
            }
            else{
                //buscador de pelóculas por nobre
                require_once("../vistas/movieView.php");
                //le pasamos el nombre por la url
                $nombrePeli = $_GET['buscador'];
                
                $myConnection = new MovieController(); #Instancio un controlador (objeto ProductController)
                $myMovieView = new MovieView();
                //obtenemos la lista de pelis por su nombre
                $movieList = $myConnection->getMovieByName($nombrePeli);
                //imprimimos las pelis por su nombre
                $myMovieView->printMovieByName($movieList);
            }

        


            ?>
        </div>
        

        <footer>
            <div class="copyright">
                Author: Kumar Baltar López-Cózar
                <div class="contenedor">
                    ©  Copyright: 
                
                </div>
            </div>
        </footer>

    </body>
</html>