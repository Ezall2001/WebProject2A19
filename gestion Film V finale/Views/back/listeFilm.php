<?php
require "./../../Controllers/filmC.php";

$filmC =new FilmC();
$list=$filmC->afficher();


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="Liste_Films.css">  
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


    <title>DATA</title>
</head>
<style>
 #recherche{
    position: absolute;
    top: 60px;
    right: 120px;
  }
  .tm-about-box-1-img {
  display: block;
  margin: 0 auto 50px;
  border-radius: 50%;
  border: 2px solid #d4d4d4;
  transition: all 0.3s ease;
  width: 70px;
  height: 70px;
}
</style>
<body>

    <div class="container">
        <button class="btn btn-primary my-5"><a href="ajouter.php" class="text-light"><span>&#43;</span>Add</a>
    </button><br>
    <!-- <form action="" method="GET"  enctype="multipart/form-data">
      <section class="recherche">
      <div class="recherche" id="recherche">
        <input type="search" name="rech">  -->
        <!-- <label ><i class="fa fa-search"><a href="find.php" class="text-light"></i> </label>  -->
        <!-- <button class="btn btn-primary my-5"><a href="find.php" class="text-light"></a></button>
       
        <div id="nbr">2 resultats trouvés </div>
        <ol>
          <li>Resultat 1</li>
        </ol>
        </div>
        </section>
    </form> -->
    <table class="table">
  <thead>
    <tr>
	
      <th scope="col">IdF</th>
      <th scope="col">titre</th>
      <th scope="col">anneeR</th>
      <th scope="col">decenie</th>
      <th scope="col">duree</th>
      <th scope="col">photo</th>
      <th scope="col">lien</th>
      <th scope="col"> IdG</th>
    </tr>
  </thead>
  <tbody>
   <?php
      foreach ($list as $row) { 
   ?>
        <tr>
          <td><?php echo $row['IdF']?></td>
          <td><?php echo $row['titre']?></td>
          <td><?php echo $row['anneeR']?></td>
          <td><?php echo $row['decenie']?></td>
          <td><?php echo $row['duree']?></td>
          
          <td><img src="<?php echo $row['photo']; ?>" ></td>

          <td><?php echo $row['lien']?></td>
           
          <td><?php echo $row['IdG']?></td>
        <br> <br> <br>
          <td>
              <button class="btn btn-primary"><a href="update.php?updateid=<?php echo $row['IdF'];?>" class="text-light"> <i class="fa fas fa-edit style=font-size:36px" ></i></a></button>
              <button class="btn btn-danger"><a href="delete.php?deleteid=<?php echo $row['IdF'];?>" class="text-light"> <i class="fa fa-trash"></i>

              </a></button>
                         <td>
        
        
        
        
        
        
        </tr>
        <?php
      }
       ?>









    <!-- foreach ($list as $row) { 
        echo ' <tr><td >' . $row['IdF'] . '</td>
                         <td >' . $row['titre'] . '</td>
                         <td>' . $row['anneeR'] . '</td>
                         <td>' . $row['decenie'] . '</td>
                         <td>' . $row['duree'] . '</td>
                         <td>' . $row['photo'] . '</td>
                         <td>' . $row['IdG'] . '<td>
                         <td>
                         <button class="btn btn-primary"><a href="update.php?updateid=' . $row['IdF'] . '" class="text-light"> <i class="fa fas fa-edit style=font-size:36px" ></i></a></button>
                         <button class="btn btn-danger"><a href="delete.php?deleteid=' . $row['IdF'] . '" class="text-light"> <i class="fa fa-trash"></i>

                         </a></button>
                         <td>
                         </tr>';
    } -->



  </tbody>
</table>

</body>
</html>