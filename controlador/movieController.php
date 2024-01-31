<?php
require("../../modelo/Connection.php");
class MovieController{

    private $myConnection;

    #Constructor
    public function __construct() {

        $this->myConnection = new Connection();

    }

    ////////////////////////////////////////////////////////////////
    //llama a obtener todas las peliculas
    public function getAllMovies(){
        $movieList = $this->myConnection->selectAllMovies();
        
        return $movieList;
    }
    //llama a obtener peli por id publica para el detalle de la peli
    public function getMovieByPublicid($id){
        $movie = $this->myConnection->selectMovieByPublicid($id);
        return $movie;
    }

    //llama a obtener peli por nombre
    public function getMovieByName($movieName){
        $movieList = $this->myConnection->selectMovieByName($movieName);
        return $movieList;
    }

    //llama a selecionar comentarios por idpublica
    public function getUserCommentsByPublicid($publicid){
        $userCommentList = $this->myConnection->selectUserCommentsByPublicid($publicid);
        return $userCommentList;
    }


    //setmovie
    public function setMovie($publicid, $name, $synopsis, $releaseyear, $directorname, $posterurl){
        
        $id = null;
        $averagerating = null;

        $movie = new Movie($id, $publicid, $name, $synopsis, $releaseyear, $directorname, $posterurl, $averagerating);
        $this->myConnection->insertMovie($movie);
    }

    //llama a aeliminar peli, le pasamos la id publica
    public function removeMovieBypublicid($id){
        $this->myConnection->deleteMovieBypublicid($id);

    }

    //llama a id privada pasandole la pública
    public function getIdByPublicid($publicid){
        $id = $this->myConnection->selectIdByPublicid($publicid);
        return $id;
    }

    //llamama insertar comentarios
    public function setComment($userid, $movieid, $comment){
        $id = null;
        $commentDate = null;
        $userComment = new Comment($id, $userid, $movieid, $comment, $commentDate);
        $this->myConnection->insertComment($userComment);    
        
    }
    //compruba la longitud del comentario
    public function checkCommentLength($comment){
        $valid = false;
        //la  longitud del string no puede ser menor de 10 caracteres y mayor de 200
        if(strlen($comment)<10 || strlen($comment)>200){
            $valid = false;
        }else{
            $valid = true;
        }
        return $valid;
    }

    //puntua pelis
    public function setRating($userid, $movieid, $rating){
        $movieRating = new UserRatesMovie($userid, $movieid, $rating);
        $this->myConnection->insertRating($movieRating);
    }
    
    //llama a recoger puntuacion media
    public function getRatingByid($movieid){
        $rating = $this->myConnection->selectRating($movieid);
        return $rating;
    }

}

?>