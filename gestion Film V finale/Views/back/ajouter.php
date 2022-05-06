<?php

//require "./../../Model/film.php";
require "./../../Controllers/filmC.php";

$IdF = '';
$titre = '';
$anneeR = '';
$decenie = '';
$duree = '';
$photo = '';
$lien = '';
$IdG = '';

if (isset($_POST['idF']) && isset($_POST['titre']) ) {

  $IdF = $_POST['idF'];
  $titre = $_POST['titre'];
  $anneeR = $_POST['annee'];
  $decenie = $_POST['decenie'];
  $duree = $_POST['duree'];
  //$photo =$_POST['image[]'];
  $IdG = $_POST['idG'];
  $lien = $_POST['lien'];


  // $photo=$_POST['image[]'];


  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  
  
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      $film = new film($IdF, $titre, $anneeR, $decenie, $duree,$target_file,$lien,$IdG);
      $filmC = new FilmC();
      $filmC->ajouter($film);
    
      header('location: listeFilm.php');
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }



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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="Liste_Films.css">
  <title>Ajouter Film</title>
</head>

<body>
  <center>

    <h1>Ajouter un film</h1>
  </center>
  <div class="container my-5">

    <form method="POST" id="form" class="env"  enctype="multipart/form-data"  onsubmit="event.preventDefault(); verif();">
      <div class="mb-3">
        <label>ID</label>
        <input type="text" style="color:bisque;" class="form-control" name="idF" id="idF" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>titre</label>
        <input type="text" style="color:bisque;" class="form-control" name="titre" id="titre" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>annee</label>
        <input type="text" style="color:bisque;" class="form-control" name="annee" id="annee" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>decenie</label>
        <input type="text" style="color:bisque;" class="form-control" name="decenie" id="decenie" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>duree</label>
        <input type="text" style="color:bisque;" class="form-control" name="duree" id="duree" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>id genre</label>
        <input type="text" style="color:bisque;" class="form-control" name="idG" id="idG" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>lien</label>
        <input type="text" style="color:bisque;" class="form-control" name="lien" id="lien" autocomplete="off">
      </div>
      
      <div class="mb-3">
        <label>image</label>
        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
      </div>

      <!-- <button type="submit" class="btn btn-primary my-5" name="submit">Save</button>
          <br>   -->

      <button type="submit" class="btn btn-primary my-5" name="submitbtn" onclick="verif();">Save</button>
      <br>
      <p id="error">

      </p>
      <p id="error">


      </p>

    </form>
  </div>


  <script>
    function allLetter(word) {
      var letters = /^[A-Za-z]+$/;
      if (word.match(letters)) {
        return true;
      } else {
        return false;

      }
    }

    function startsWithCapital(word) {
      if (/[A-Z]/.test(word[0])) {
        return true;
      } else {
        return false;

      }
    }

    function verif() {
      var titre = document.getElementById("titre").value;
      var decenie = document.getElementById("decenie").value;
      var id = document.getElementById("idF").value;
      var annee = document.getElementById("annee").value;
      var duree = document.getElementById("duree").value;

      var ok = true;

      if (allLetter(titre) === false) {
        alert("le titre doit etre en lettres ");
        document.getElementById("msgDiv1").innerHTML = "le nom doit etre en lettres ";
        preventdefault();
        returnToPreviousPage();
        return false;
      }
      /* if (startsWithCapital(titre) == false) {
         alert("le premier lettre du titre en majiscule!");
         document.getElementById("msgDiv12").innerHTML = "le premier lettre du titre doit etre en majiscule! ";
         preventdefault();
         returnToPreviousPage();
         return false;
       }*/

      if (id < 0) {
        alert("id doit etre positive");
        document.getElementById("msgDiv12").innerHTML = "id doit etre positive! ";
       preventdefault();
        returnToPreviousPage();
        return false;
      }

      if (duree < 1) {
        alert("duree doit etre positive");
        document.getElementById("msgDiv12").innerHTML = "duree doit etre positive! ";
        preventdefault();
        returnToPreviousPage();
        return false;
      }

      if (annee <= 1950 || annee >= 2023) {
        alert("annee invalide");
        document.getElementById("msgDiv12").innerHTML = "annee invalide ";
        preventdefault();
        returnToPreviousPage();
        return false;
      }




      document.forms["form"].submit();

      return true;

    }
  </script>



  <!-- <script src="captcha.js"></script> -->
</body>

</html>