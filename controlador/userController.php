<?php
require("../../modelo/Connection.php");
class UserController{

    private $myConnection;

    #Constructor
    public function __construct() {

        $this->myConnection = new Connection();

    }

    //llama la function selectUsers
    public function getAllUsers(){
        $userList = $this->myConnection->selectAllUsers();
        
        return $userList;
    }

    //llama a la funcion obtener usuario por nick
    public function getUserByNick($nick){
        $user = $this->myConnection->selectUserByNick($nick);
        return $user;
    }

    //llama a la fucnion select id de usurio por nick
    public function getUserIdByNick($nick){
        $userid = $this->myConnection->selectUserIdByNick($nick);
        return $userid;
    }

    //llama a la funcion select pelis favortitas de usuario por el ncik
    public function getUserFavMovieByUserNick($nick){
        $userFavMovieList = $this->myConnection->selectUserFavMovieByUserNick($nick);
        //print_r($nick);
        //print_r($userFavMovieList);
        return $userFavMovieList;
    }

    //insertamos el producto
    public function setUser($nick, $avatarURL, $email){
        $id = null;
        $user = new User($id, $nick, $avatarURL, $email);
        $this->myConnection->insertUser($user);
    }

    

}

?>