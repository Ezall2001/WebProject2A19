<?php

class genre{
   private $IdG;
   private $type; 


   function __construct($IdG,$type){
    $this->IdG=$IdG;
    $this->type=$type;
}




function getIdG(){
    return $this->IdG;
}
function setIdG($IdG){
    $this->IdG =$IdG;
}

function getType(){
    return $this->type;
}
function setType($type){
    $this->type =$type;
}
}
?>