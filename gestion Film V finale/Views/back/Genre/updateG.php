<?php

require "./../../../Controllers/genreC.php";

$IdG = $_GET['updateid'];
$genreC = new GenreC();
$liste = $genreC->afficherModif($IdG);
foreach ($liste as $row) {
  //$IdF=$row['idF'];
  $type = $row['type'];
  
}


if (isset($_POST['submit'])) {

 // $IdG = $_POST['IdG'];
  $type = $_POST['type'];
  


  // $photo=$_POST['image[]'];


 //$genre = new genre($IdG,$type);


  $genreC->updategenre($IdG,$type);

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
  <link rel="stylesheet" href="captcha.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="./../Liste_Films.css">
 
  <title>Add Genre</title>
</head>

<body>
  <center>

    <h1>Modifier</h1>
  </center>
  <div class="container my-5">

    <form method="POST" class="env">
      <div class="mb-3">
        <label>ID_Genre</label>
        <input type="text" class="form-control" name="idG" id="idG" value="<?php echo $IdG  ?>" autocomplete="off">
      </div>
      <div class="mb-3">
        <label>type</label>
        <input type="text" class="form-control" name="type" id="type" value="<?php echo $type  ?>" autocomplete="off">
      </div>
      
     

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