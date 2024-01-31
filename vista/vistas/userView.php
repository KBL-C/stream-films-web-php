<?php
require "../../controlador/userController.php"; #Añado la librería de la clase ProductController

class UserView{
    public function __construct(){

    }

    #Función que imprime una lista de usuarios
    public function printUserList($userList){
        foreach($userList as $user){
            //echo "<div class=\"articulo\">";
            echo "<div class=\"cont\">";
                echo "<a href=\"indexUserDetail.php?userNick=".$user->getNick()."\"><img class=\"img\"  src=\"".$user->getAvatarUrl()."\" width=\"300\" height=\"300\"></a>";
                echo "<p><a href=\"indexUserDetail.php?userNick=".$user->getNick()."\">".$user->getNick()."</a></p>";
                echo "<p>Email: ".$user->getEmail()."</p>";  
            echo "</div>";
        }
    }

}
?>