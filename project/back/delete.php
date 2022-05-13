<?php


require "../../app/controller/filmC.php";
$filmC = new FilmC();

$filmC->delete($_GET['deleteid']);
header('location: listeFilm.php');


?>