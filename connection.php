<?php
class config {
    private static $instance = NULL;

    public static function getConnexion() {
      if (!isset(self::$instance)) {
		try{
        self::$instance = new PDO('mysql:host=localhost;dbname=gestion_film', 'root', '');
		self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*
    $inter_join="SELECT film.IdG, genre.IdG
    FROM film
    INNER JOIN genre
    ON film.IdG = genre.IdG"
    ;
    $query=self::$instance->prepare($inter_join);
    $query->execute();
    $result=$query->fetchAll();
    echo '<pre >';
    print_r($result);
    echo '<pre >';*/

 		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return self::$instance;
    }
  }
?>