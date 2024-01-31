<?php
/**
 * clase movie
 */
class Movie{
    //atributes
    private $id;
    private $publicid;
    private $name;
    private $synopsis;
    private $releaseyear;
    private $directorname;
    private $posterurl;
    private $averagerating;

    //construct method
    public function __construct($id, $publicid, $name, $synopsis, $releaseyear, $directorname, $posterurl, $averagerating){
        $this->id = $id;
        $this->publicid = $publicid;
        $this->name = $name;
        $this->synopsis = $synopsis;
        $this->releaseyear = $releaseyear;
        $this->directorname = $directorname;
        $this->posterurl = $posterurl;
        $this->averagerating = $averagerating;

    }

    //getters nad setters

    private function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    private function setPublicid($publicid){
        $this->publicid = $publicid;
    }
    public function getPublicid(){
        return $this->publicid;
    }

    private function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    private function setSynopsis($synopsis){
        $this->synopsis = $synopsis;
    }

    public function getSynopsis(){
        return $this->synopsis;
    } 

    private function setReleaseyear($releaseyear){
        $this->releaseyear = $releaseyear;
    }

    public function getReleaseyear(){
        return $this->releaseyear;
    } 

    private function setDirectorname($directorname){
        $this->directorname = $directorname;
    }

    public function getDirectorname(){
        return $this->directorname;
    } 

    private function setPosterurl($posterurl){
        $this->posterurl = $posterurl;
    }

    public function getPosterurl(){
        return $this->posterurl;
    }
    
    private function setAveragerating($averagerating){
        $this->averagerating = $averagerating;
    }

    public function getAveragerating(){
        return $this->averagerating;
    }



}

?>