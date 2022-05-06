<?php

include "../../Model/genre.php";
class configG {
    private static $instance = NULL;

    public static function getConnexion() {
      if (!isset(self::$instance)) {
		try{
        self::$instance = new PDO('mysql:host=localhost;dbname=gestion_film', 'root', '');
		self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return self::$instance;
    }
  }

 // include '../connection.php';
 // require './../../../Model/film.php';




///___ ____________________________ FONCTION AJOUTER
class GenreC{
function ajouter($genre){  
try{

$sql="INSERT INTO genre(IdG,type) 
VALUES (:IdG,:type)";

// $sql->execute(array($_FILES["image"]['name'],$_FILES["image"]["size"],$_FILES['image']['type'],file_get_contents($_FILES["image"]["tmp_name"])));
  $db=configG::getConnexion();

  $query=$db->prepare ($sql);

    
   
        $query->bindValue(':IdG',$genre->getIdG());  
        $query->bindValue(':type',$genre->getType());  
       
  
      $query->execute();
      echo"\n success";
      //header('location:affichage.php');

        }
        catch(PDOException $e){
        $e->getMessage();
            echo"faild";
            echo $e->getMessage();
    }
}

// MY CRUD
///___ ____________________________ FONCTION AFFICHER______________________________
function afficher(){  
    try{
        $sql="SELECT * FROM genre";
        $db=configG::getConnexion();
       return $db->query($sql);
    }
    catch(PDOException $e){
        $e->getMessage();
    }

}


function getType($IdG){  
    $requete = "select * from genre where IdG=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$IdG
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }

}



function afficherModif($IdG){  
    try{
        $sql = "SELECT * FROM genre";
        $db=configG::getConnexion();
        return $db->query($sql);
     }
     catch(PDOException $e){
         $e->getMessage();
     }

}
  ///___ ____________________________ FONCTION find__________________________________

/*function find_film($q){  
    try{
    $sql = "SELECT * FROM film WHERE titre LIKE '%$q%' ";
    $db=configG::getConnexion();
    return $db->query($sql);
 }
 catch(PDOException $e){
     $e->getMessage();
 }

}


*/
///___ ____________________________ FONCTION DELETE________________________________

function delete($IdG) {

    $sql=" DELETE FROM genre  WHERE  IdG=:IdG";
   
    $db=configG::getConnexion();
    $query=$db->prepare ($sql);
    $query->bindValue(':IdG',$IdG); 
 $query->execute();
}
 ///___ ____________________________ FONCTION MOFIDIER________________________________

function updategenre($IdG,$type)
{ try
    {
         $sql="UPDATE genre SET
          IdG='$IdG',type='$type' WHERE IdG='$IdG'";
 $db=configG::getConnexion();
   
        $db->query($sql);
        
    }
    catch (Exception $e)
    {
        die('Erreur: '.$e->getMessage());
    }
}


}
?>