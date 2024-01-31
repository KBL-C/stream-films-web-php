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
                <li><a href="indexMovie.php">Movies</a></li>
                <li><a href="../addUser.html">Add movies</a></li>
                <li><a href="../addUser.html">Add users</a></li>
                <li id="btnusuarios"><a href="indexUser.php">Users</a></li>
            </ul>
        </nav>
        <h1 id="t1" class="t1">
            Users
        </h1>
        <div id="full_cont_detail_usuario">

            <?php
            require("../vistas/userView.php");

            $myConnection = new UserController(); #Instancio un controlador (objeto ProductController)
            $myUserView = new UserView(); #Instancio un objeto ProductView

            /**
             * obtenemos toda la lista de usuario, a través de su controlador
             */
            $userList=$myConnection->getAllUsers(); #Le pido al controlador todos los productos disponibles en BBDD
            //imrimimos los usarios en la vista de usuarios
            $myUserView->printUserList($userList); #Muestro todos los productos

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