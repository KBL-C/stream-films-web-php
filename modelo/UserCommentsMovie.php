<?php
/**
 * clase comenatios
 */
class UserCommentsMovie{
    //atributes
    private $nick;
    private $avatarurl;
    private $id;
    private $comment;
    private $commentdate;
    private $publicid;

    //construct method
    public function __construct( $nick, $avatarurl, $id, $comment, $commentdate, $publicid){
        $this->nick = $nick;
        $this->avatarurl = $avatarurl;
        $this->id = $id;
        $this->comment = $comment;
        $this->commentdate = $commentdate;
        $this->publicid = $publicid;

    }

    //getters nad setters
    private function setNick($nick){
        $this->nick = $nick;
    }
    public function getNick(){
        return $this->nick;
    }

    private function setAvatarurl($avatarurl){
        $this->avatarurl = $avatarurl;
    }

    public function getAvatarurl(){
        return $this->avatarurl;
    }

    private function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    private function setComment($comment){
        $this->comment = $comment;
    }
    public function getComment(){
        return $this->comment;
    } 

    private function setCommentdate($commentdate){
        $this->commentdate = $commentdate;
    }
    public function getCommentdate(){
        return $this->commentdate;
    }

    private function setPublicid($publicid){
        $this->publicid = $publicid;
    }
    public function getPublicid(){
        return $this->publicid;
    }



}

?>