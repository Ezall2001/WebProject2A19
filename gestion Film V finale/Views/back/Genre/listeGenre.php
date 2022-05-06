<?php
require "./../../../Controllers/genreC.php";
$genreC = new genreC();
$list=$genreC->afficher();


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./../Liste_Films.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


    <title>DATA_Genre</title>
</head>
<style>
    #recherche {
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
        <button class="btn btn-primary my-5"><a href="ajouterG.php" class="text-light"><span>&#43;</span>Add_Genre</a>
        </button><br>
        <!-- <form action="" method="GET">
            <div id="recherche">
                <input type="search" name="rech">
                <label><i class="fa fa-search"></i> </label>
            </div>
        </form> -->
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">idG</th>
                    <th scope="col">type</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $row) {
                   
                    echo ' <tr><td >' . $row['IdG'] . '</td>
                        <td >' . $row['type'] . '</td>

                        
                         <td>
                       
                        
                         
                         <button class="btn btn-primary"><a href="updateG.php?updateid=' . $row['IdG'] . '" class="text-light"> <i class="fa fas fa-edit style=font-size:36px" ></i></a></button>
                         <button class="btn btn-danger"><a href="deleteG.php?deleteid=' . $row['IdG'] . '" class="text-light"> <i class="fa fa-trash"></i></a> </button>
                         <td>
                         </tr>';
                }

                ?>

            </tbody>
        </table>

</body>

</html>