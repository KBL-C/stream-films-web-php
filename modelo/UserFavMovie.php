<?php
/**
 * clase userfavmovies
 */
class UserFavMovie{
    //atributes
    private $userid;
    private $movieid;

    //construct method
    public function __construct($userid, $movieid){
        $this->userid = $userid;
        $this->movieid = $movieid;

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


}

?>