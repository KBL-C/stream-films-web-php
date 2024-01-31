<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type">
        <meta content="text/html">
        <meta charset="utf-8">
        <title>html_pelis_raffinity</title>
        <link rel="stylesheet" type="text/css" href="../estilos/front_css.css">
        <script type="text/javascript" src="../JavaScript/checkUserData.js"></script>
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
                <li><a href="../addMovie.html">Add movies</a></li>
                <li><a href="../addUser.html">Add users</a></li>
                <li id="btnusuarios"><a href="indexUser.php">Users</a></li>
            </ul>
        </nav>
        <h1 id="t1" class="t1">
            Movie details
        </h1>
        <div id="full_cont_peli">

            <?php
            require_once("../detalles/detailMovie.php");

            $myConnection = new MovieController(); #Instancio un controlador (objeto ProductController)
            $myDetailMovie = new DetaileMovie();
            $id =$_GET['moviePublicid'];
    
            //obtenemos la película por su id pública que se la pasamos por la url
            $movie=$myConnection->getMovieByPublicid($id); #Le pido al controlador todos los productos disponibles en BBDD

            //imprimimos lso detalles de la película desde la vista de peliculas
            $myDetailMovie->printMovieByPublicid($movie); #Muestro todos los productos

            //formulario para puntura las películas
            echo "<form action=\"../../controlador/formularios/rateMovie.php\" method=\"POST\"  autocomplete=\"off\">";
            echo "<div id=\"form\">";
                echo "<div id=\"userForm\" class=\"userForm\">";

                    echo "<label for=\"rat\"></label><br>"; 
                    
                    echo "<input list=\"ratings\" name=\"ratingmovies\" id=\"rat\">";
                    echo"<datalist id=\"ratings\">";
                        echo "<option value=\"1\"></option>";
                        echo "<option value=\"2\"></option>";
                        echo "<option value=\"3\"></option>";
                        echo "<option value=\"4\"></option>";
                        echo "<option value=\"5\"></option>";
                    echo "</datalist>";
                    echo "<button type=\"submit\"  class=\"btnenviarUsuario\" name=\"rm\" value=\"$id\">rate movie</button>";
                            
                    echo "</div>";
                echo "</div>";
            echo "</div>";
            echo "</form>";


            ?>
        </div>
        <div>
            <?php
            require_once("../detalles/detailMovie.php");

            $myConnection = new MovieController(); #Instancio un controlador (objeto ProductController)
            $myDetailMovie = new DetaileMovie();
            $publicid =$_GET['moviePublicid'];

            /**
             * listar comentarios  película:
             * obtenemos los comentarios por la id pública de la peli
             */
            $userCommentList = $myConnection->getUserCommentsByPublicid($publicid);

            //imprimimos la lista de comenatrios por peli
            $myDetailMovie->printUserCommentList($userCommentList);

            ?>
        </div>
        <form action="../../controlador/formularios/processComment.php" method="POST"  autocomplete="off">
            <div id="form">
                <div id="userForm" class="userForm">
                    <h1 class="nUsarioT">
                       New comment
                    </h1>
                        <label for="come"></label><br>
                        <?php
                        //formulario para introducir un nuevo comentario sobre la película
                        echo "<textarea name=\"textarea\" id=\"come\" placeholder=\"comentario\" rows=\"5\" cols=\"60\"></textarea>";
                        echo "<button type=\"submit\"  class=\"btnenviarUsuario\" name=\"pid\" value=\"$id\">add</button>";
                        
                        ?>
                    </div>
                </div>
            </div>
            
        </form>

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