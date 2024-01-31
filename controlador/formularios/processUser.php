<?php
require("../userController.php");
//obtenemos los datos del formulario
$userNick = $_POST['nick'];
$userUrl = $_POST['avatarUrl'];
$userEmail = $_POST['email'];



//creamos la conexion
$myConnection = new UserController();
//comprobación de datos: 
if($userNick=="" || $userEmail=="" || $userUrl==""){
    header("Location: http://localhost/Proyecto_Raffinity/vista/addUser.html");
}else{
    //insertamos el producto
    //llamamos la funcion que prepara el objeto para insertarlo
    $myConnection->setUser($userNick, $userUrl, $userEmail);
    header("Location: http://localhost/Proyecto_Raffinity/vista/indexes/indexUser.php");
}



?>