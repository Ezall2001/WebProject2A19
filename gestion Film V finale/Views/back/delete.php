<?php


require "./../../Controllers/filmC.php";
$filmC = new FilmC();

$filmC->delete($_GET['deleteid']);
header('location: listeFilm.php');


?>