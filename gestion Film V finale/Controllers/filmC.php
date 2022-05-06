<?php



include "./../../Model/film.php";
include '../connection.php';
//include "./../../Model/film.php";

 
///___ ____________________________ FONCTION AJOUTER
class FilmC{
function ajouter($film){  
try{

                        
   $sql=" INSERT INTO film (IdF,titre, anneeR, decenie, duree,photo,lien, IdG)
     VALUES (:IdF,:titre, :anneeR, :decenie, :duree,:photo,:lien ,:IdG)";

//   $sql->execute(array($_FILES["image"]['name'],$_FILES["image"]["size"],$_FILES['image']['type'],file_get_contents($_FILES["image"]["tmp_name"])));
  $db=config::getConnexion();

  $query=$db->prepare ($sql);
 // $query->execute(array($_FILES["photo"]['name'],$_FILES["photo"]["size"],$_FILES['photo']['type'],file_get_contents($_FILES["photo"]["tmp_name"])));

    
   
        $query->bindValue(':IdF',$film->getIdF());  

        $query->bindValue('titre',$film->getTitre());  
        $query->bindValue(':anneeR',$film->getAnneeR());  
        $query->bindValue(':decenie',$film->getDecenie());  
        $query->bindValue(':duree',$film->getDuree());   
        $query->bindValue(':photo',$film->getPhoto()); 
        $query->bindValue(':lien',$film->getLien()); 
        $query->bindValue(':IdG',$film->getIdG());  
       
  
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
        $sql="SELECT * FROM film ";
            $db=config::getConnexion();
            
           
          //  $db=config::getConnexion();
            
       return $db->query($sql);
    }
    catch(PDOException $e){
        $e->getMessage();
    }

}

function recherche($titre){  
    try{
        $sql = "SELECT * FROM film WHERE titre LIKE '%".$titre."%' ";
        $db=config::getConnexion();
        return $db->query($sql);
     }
     catch(PDOException $e){
         $e->getMessage();
     }

}


function filter($IdG,$decenie,$att,$ascORdesc){  
    try{
        $sql="SELECT * FROM film where IdG like '%".$IdG."%' AND decenie like '%".$decenie."%' order by ".$att." ".$ascORdesc;
            $db=config::getConnexion();
            
           
          //  $db=config::getConnexion();
            
       return $db->query($sql);
    }
    catch(PDOException $e){
        $e->getMessage();
    }

}
function afficherModif($IdF){  
    try{
        $sql = "SELECT * FROM film WHERE IdF LIKE '%$IdF%' ";
        $db=config::getConnexion();
        return $db->query($sql);
     }
     catch(PDOException $e){
         $e->getMessage();
     }

}
  ///___ ____________________________ FONCTION find__________________________________

/*function find_film($q){  
    try{
    $sql = "SELECT FROM film WHERE titre LIKE '%$q%' ";
    $db=config::getConnexion();
    return $db->query($sql);
 }
 catch(PDOException $e){
     $e->getMessage();
 }

}*/

function find_film($q){  
    try{
    $sql = "SELECT * FROM film WHERE lieu LIKE '%$q%' ";
    $db=config::getConnexion();
    return $db->query($sql);
 }
 catch(PDOException $e){
     $e->getMessage();
 }

}



function getFilm($IdF){  
    $requete = "select * from film where IdF=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$IdF
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }

}


///___ ____________________________ FONCTION DELETE________________________________

function delete($IdF) {

    $sql=" DELETE FROM film  WHERE  IdF=:IdF";
   
    $db=config::getConnexion();
    $query=$db->prepare ($sql);
    $query->bindValue(':IdF',$IdF); 
 $query->execute();
}
 ///___ ____________________________ FONCTION MOFIDIER________________________________

function updatefilm($titre,$anneeR,$decenie,$duree,$lien){
// { try
//     {
//       $sql="UPDATE film SET 
//         titre='$titre',anneeR='$anneeR',decenie='$decenie',duree='$duree',lien='$lien'
//          where  titre='$titre'";
//  $db=config::getConnexion();
   
//         $db->query($sql);
        
        
//     }
//     catch (Exception $e)
//     {
//         die('Erreur: '.$e->getMessage());
//     }
try
{
     $sql="UPDATE film SET
      titre='$titre',anneeR='$anneeR',decenie='$decenie' ,duree='$duree', lien='$lien' WHERE titre='$titre'";
$db=config::getConnexion();

    $db->query($sql);
    
}
catch (Exception $e)
{
    die('Erreur: '.$e->getMessage());
}
}


}
?>