<?php

//require "./../../Model/film.php";
require "./../../../Controllers/genreC.php";

$IdG = '';
$type = '';

if (isset($_POST['IdG']) ) {

  $IdG = $_POST['IdG'];
  $type = $_POST['type'];
  

  
  
  

  

      $genre = new genre($IdG, $type);
      $genreC = new GenreC();
      $genreC->ajouter($genre);
    
      header('location: listeGenre.php');
    
  



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
  <link rel="stylesheet" href="./../Liste_Films.css">
  <title>Ajouter Genre</title>
</head>

<body>
  <center>

    <h1>Ajouter un genre</h1>
  </center>
  <div class="container my-5">

    <form method="POST" id="form" class="env"  enctype="multipart/form-data" >
      <div class="mb-3">
        <label>IDG</label>
        <input type="text" style="color:bisque;" class="form-control" name="IdG" id="IdG" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>type</label>
        <input type="text" style="color:bisque;" class="form-control" name="type" id="type" autocomplete="off">
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

  //   function verif() {
  //     var type = document.getElementById("type").value;
      
  //     var id = document.getElementById("iIdG").value;
     

  //     var ok = true;

  //     if (allLetter(type) === false) {
  //       alert("le type doit etre en lettres ");
  //       document.getElementById("msgDiv1").innerHTML = "le nom doit etre en lettres ";
  //       preventdefault();
  //       returnToPreviousPage();
  //       return false;
  //     }
  //     /* if (startsWithCapital(type) == false) {
  //        alert("le premier lettre du type en majiscule!");
  //        document.getElementById("msgDiv12").innerHTML = "le premier lettre du type doit etre en majiscule! ";
  //        preventdefault();
  //        returnToPreviousPage();
  //        return false;
  //      }*/

  //     if (id < 0) {
  //       alert("id doit etre positive");
  //       document.getElementById("msgDiv12").innerHTML = "id doit etre positive! ";
  //      preventdefault();
  //       returnToPreviousPage();
  //       return false;
  //     }

    




  //     document.forms["form"].submit();

  //     return true;

  //   }
  // </script>



  <!-- <script src="captcha.js"></script> -->
</body>

</html>