<?php
require "./../../../Controllers/genreC.php";
$genreC = new GenreC();

$genreC->delete($_GET['deleteid']);
header('location: listeGenre.php');

?>