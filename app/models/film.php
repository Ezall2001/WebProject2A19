<?php
class film{
    private $IdF;
    private $titre;
    private $anneeR;
    private $decenie;
    private $duree;
    private $photo;
    private $lien;
    private $IdG;

   


    function __construct($IdF,$titre,$anneeR,$decenie,$duree,$photo,$lien,$IdG){
    $this->IdF=$IdF;
    $this->titre=$titre;
    $this->anneeR=$anneeR;
    $this->decenie=$decenie;
    $this->duree=$duree;
  
    $this->photo=$photo;
    $this->lien=$lien;
    $this->IdG=$IdG;

    } 
  

function getIdF(){
    return $this->IdF;
}
function setIdF($IdF){
    $this->IdF =$IdF;
}



function getTitre(){
    return $this->titre;
}
function setTitre($titre){
    $this->titre =$titre;
}



function getAnneeR(){
    return $this->anneeR;
}
function setAnneeR($anneeR){
    $this->anneeR =$anneeR;
}



function setDecenie($decenie){
    $this->decenie =$decenie;
}
function getDecenie(){
    return $this->decenie;
}


function getDuree(){
    return $this->duree;
}

function setDuree($duree){
    $this->duree =$duree;
}

function getPhoto(){
    return $this->photo;
}

function setPhoto($photo){
    $this->photo=$photo;
}

function getLien(){
    return $this->lien;
}
function setLien($lien){
    $this->lien =$lien;
}


function getIdG(){
    return $this->IdG;
}
function setIdG($IdG){
    $this->IdG =$IdG;
}





}
?>