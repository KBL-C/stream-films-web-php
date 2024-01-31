<?php
/**
 * clase usuario
 */
class User{
    //atributes
    private $id;
    private $nick;
    private $avatarURL;
    private $email;

    //construct method
    public function __construct($id, $nick, $avatarURL, $email){
        $this->id = $id;
        $this->nick = $nick;
        $this->avatarURL = $avatarURL;
        $this->email = $email;

    }

    //getters and setters
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