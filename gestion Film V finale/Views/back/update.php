<?php

//include "./../../Model/film.php";
require "./../../Controllers/filmC.php";
 
$IdF = $_GET['updateid'];
$filmC = new FilmC();
$liste = $filmC->afficherModif($IdF);
foreach ($liste as $row) {
  // $IdF=$row['idF'];
  $titre = $row['titre'];
  $anneeR = $row['anneeR'];
  $decenie = $row['decenie'];
  $duree = $row['duree'];
 // $photo = $row['photo'];
  $lien = $row['lien'];
 $IdG = $row['IdG'];
}


if (isset($_GET['submit'])) {

  // $IdF = $_GET['idF'];
  $titre = $_GET['titre'];
  $anneeR = $_GET['anneeR'];
  $decenie = $_GET['decenie'];
  $duree = $_GET['duree'];
  // $photo = $_GET['photo'];
  $lien = $_GET['lien'];
  // $IdG = $_GET['idG'];


   //$photo=$_POST['image[]'];

  //  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  //  $uploadOk = 1;
  //  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   
// function updatefilm($IdF,$titre,$anneeR,$decenie,$duree,$photo,$lien,$IdG);
//   $film = new film($IdF, $titre, $anneeR, $decenie, $duree,$photo,$lien, $IdG);

  $filmC->updatefilm($titre,$anneeR,$decenie,$duree,$lien);

  header('location: listeFilm.php');
}
//echo "not isset userlogin"



?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="captcha.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="Liste_Films.css">
  <title>Add Film</title>
</head>

<body>
  <center>

    <h1>Modifier</h1>
  </center>
  <div class="container my-5">

    <form method="GET" class="env">
      <div class="mb-3">
        
      <div class="mb-3">
        <label>titre</label>
        <input type="text" class="form-control" name="titre" id="titre" value="<?php echo $titre  ?>" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>annee</label>
        <input type="text" class="form-control" name="anneeR" id="anneeR" value="<?php echo  $anneeR ?>" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>decenie</label>
        <input type="text" class="form-control" name="decenie" id="decenie" value="<?php echo $decenie  ?>" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>duree</label>
        <input type="text" class="form-control" name="duree" id="duree" value="<?php echo  $duree ?>" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>lien</label>
        <input type="text" class="form-control" name="lien" id="lien" value="<?php echo $lien  ?>" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>id genre</label>
        <input type="text" class="form-control" name="idG" id="idG" value="<?php echo $IdG  ?>" autocomplete="off">
      </div>
      <!-- <div class="mb-3">
        <label>image</label>
        <input type="text" class="form-control" name="photo" id="fileToUpload">
      </div> -->

      <button type="submit" class="btn btn-primary my-5" name="submit">Save</button>
      <br>
      <p id="error">

      </p>

    </form>
  </div>
  <script src="controle.js"></script>

  <!-- debut controle saisie -->



  <script>
    function allLetter(word) {
      var letters = /^[A-Za-z]+$/;
      if (word.match(letters)) {
        return true;
      } else {
        return false;

      }
    }
  </script>



































  <!-- <script src="captcha.js"></script> -->
</body>

</html>