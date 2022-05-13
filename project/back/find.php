<!-- 
function find_film($q){  
    try{
    $sql = "SELECT * FROM film WHERE titre LIKE '%$q%' ";
    $db=config::getConnexion();
    return $db->query($sql);
 }
 catch(PDOException $e){
     $e->getMessage();
 } -->

}
<?php
echo "Bonjour";

require "../../app/controller/Controllers/filmC.php";
if(isset($_GET['q'])){
    $filmC= new filmC();
    $filmC->find_film($_GET['q']);
}






?>