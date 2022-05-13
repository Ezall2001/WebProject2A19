<?php
if ($_GET['titre']) {
  
$url = 'https://www.omdbapi.com/?apikey=58b119e2&t='.$_GET['titre'];

$content = file_get_contents($url);
$film = json_decode($content, true);
//var_dump($json);

echo $film["Title"];

echo "<br>";echo "<br>";echo "<br>";echo "<br>";
echo $film["Year"];
echo "<br>";echo "<br>";echo "<br>";
echo $film["Plot"];
echo "<br>"; echo "<br>";echo "<br>";?>
<img src="<?php echo $film['Poster'] ?>" width="250" >
<?php
echo "<br>";echo "<br>";
echo $film["Language"];
echo "<br>";echo "<br>";echo "<br>";
echo $film["imdbRating"];
echo "<br>";echo "<br>";echo "<br>";
echo $film["Genre"];
echo "<br>";echo "<br>";echo "<br>";
echo $film["Director"];
echo "<br>";echo "<br>";echo "<br>";
echo $film["Writer"];
echo "<br>";echo "<br>";
echo $film["Actors"];

/*
foreach($json as $item) {
    print $item['Title'];
    print ' - ';
    print $item['Year'];
}
*/
}

?>
 


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Formation.css">
  <title>Formation</title>
 

</head>
<body>
  
</body>
</html>











 <form>
<br> <br>
   <input class="button" id="impression" name="impression" type="button" onclick="imprimer_page()" value="Imprimer cette page" />
</form>
<script type="text/javascript">
function imprimer_page(){
  window.print();
}
</script> 



