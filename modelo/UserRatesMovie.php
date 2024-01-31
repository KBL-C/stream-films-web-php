<?php

class UserRatesMovie{
    //atributes
    private $userid;
    private $movieid;
    private $rating;

    //construct method
    public function __construct($userid, $movieid, $rating){
        $this->userid = $userid;
        $this->movieid = $movieid;
        $this->rating = $rating;

    }

    //getters nad setters
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

    private function setRating($rating){
        $this->rating = $rating;
    }

    public function getRating(){
        return $this->rating;
    } 


}

?>