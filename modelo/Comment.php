<?php
/**
 * Clase comentarios
 */
class Comment{
    //atributos de la clase comentario
    private $id;
    private $userid;
    private $movieid;
    private $comment;
    private $commentDate;

    //método constructor
    public function __construct( $id, $userid, $movieid, $comment, $commentDate){
        $this->id = $id;
        $this->userid = $userid;
        $this->movieid = $movieid;
        $this->comment = $comment;
        $this->commentDate = $commentDate;

    }

     //getters nad setters
     private function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    private function setUserid($userid){
        $this->userid = $userid;
    }

    public function getUserid(){
        return $this->userid;
    }

    private function setMovieid($movieid){
        $this->movieid = $movieid;
    }
    public function getMovieid(){
        return $this->movieid;
    }

    private function setComment($comment){
        $this->comment = $comment;
    }
    public function getComment(){
        return $this->comment;
    } 

    private function setCommentdate($commentDate){
        $this->commentDate = $commentDate;
    }
    public function getCommentdate(){
        return $this->commentDate;
    }


}
?>