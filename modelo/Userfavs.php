<?php
/**
 * clase userfavs
 */
class Userfavs{
    private $userid;
    private $favMovies;
    private $id;
    private $nick;
    private $avatarURL;
    private $email;

    //construct method
    public function __construct($userid, $favMovies, $id, $nick, $avatarURL, $email){
        $this->userid = $userid;
        $this->favMovies = $favMovies;
        $this->id = $id;
        $this->nick = $nick;
        $this->avatarURL = $avatarURL;
        $this->email = $email;

    }


    //getters and setters
    private function setUserid($userid){
        $this->userid = $userid;
    }
    public function getUserid(){
        return $this->userid;
    }

    private function setFavmovies($favMovies){
        $this->favMovies = $favMovies;
    }
    public function getFavmovies(){
        return $this->favMovies;
    }

    private function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    private function setNick($nick){
        $this->nick = $nick;
    }
    public function getNick(){
        return $this->nick;
    }

    private function setAvatarUrl($avatarURL){
        $this->avatarURL = $avatarURL;
    }

    public function getAvatarUrl(){
        return $this->avatarURL;
    }

    private function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    } 
}
?>