<?php
require './../../Controllers/filmC.php';
include './../../Controllers/genreC.php';

$filmC = new FilmC();
$genreC = new GenreC();

$Genres = $genreC->afficher();
$decades = array();

if (isset($_POST['search'])) {
    $list = $filmC->recherche($_POST['search']);
} else {
    $list = $filmC->afficher();
}

if (isset($_REQUEST['ASC'])) {
    $fimsFiltered = $filmC->filter($_POST['IdG'], $_POST['decade'], $_POST['grade'], 'ASC');
} else if (isset($_REQUEST['ASC'])) {
    $fimsFiltered = $filmC->filter($_POST['IdG'], $_POST['decade'], $_POST['grade'], 'DESC');
} else {
    $fimsFiltered = $filmC->afficher();
}

// Check if user has requested to get detail
if (isset($_POST["get_data"])) {
    // Get the ID of customer user has selected
    $id = $_POST["id"];


    $row = $filmC->getFilm($id);

    // Important to echo the record in JSON format
    echo json_encode($row);

    // Important to stop further executing the script on AJAX by following line
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="Film.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- Include bootstrap & jQuery -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="js/bootstrap.js"></script> -->

    <title>Films</title>
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>


</head>

<body >

    <header>
   
        <!-- <a href="#" class="logo">
            <i class='bx bxs-movie'></i>Home
        </a> -->
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <!-- <li><a href="#home" class="home-active">Home</a></li> -->
            <a href="#" class="logo" style="color:#e6505d;">
                <i class='bx bxs-movie'></i>Home
            </a>
            <li><a href="#Movies" style="color:#e6505d;">Movies</a></li>
            <li><a href="#Categorie" style="color:#e6505d;">Categorie</a></li>
            <a href="#" style="color:#e6505d;">sign In</a>
        </ul>

        <!-- <a href="#" class="btn">sign In</a> -->
        <!--<section class="search"> -->
        <form class="search-box" method="POST">
            <input class="search-txt" type="text" name="search" placeholder="Type to search">
              
            <button type="submit" class="fa fa-search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>



    </header>


   


    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            <div class="swiper-slide conatiner">
                <img src="../images/after.gif" alt="">
                <div class="home-text">
                    <span>Drama|Romance</span>
                    <h1>After </h1>
                    <span>In Cinema</span>
                    <!-- <a href="#" class="btn">Watch Later</a> -->
                </div>
            </div>
            <!--Box 2-->

            <div class="swiper-slide conatiner">
                <img src="../images/cinema.gif" alt="">
                <div class="home-text">
                    <span>Documentary|History</span>
                    <h1>Cinema's History </h1>
                    <span>Evaluation From 1960 to 2000</span>
                    <!-- <a href="#" class="btn">Watch Later</a>
                    <a href="#" class="play">
                        <i class='bx bx-play'></i>

                    </a> -->
                </div>
            </div>

            <!--Box 3-->
            <div class="swiper-slide conatiner">
                <img src="../images/200.gif" alt="">
                <div class="home-text">
                    <span>Cartoon</span>
                    <h1>Angry Bird </h1>
                    <span>Now in cinema </span>
                    <!-- <a href="#" class="btn">Watch Later</a>
                    <a href="#" class="play">
                        <i class='bx bx-play'></i>

                    </a> -->
                </div>
            </div>

            <!--Box 4-->

            <div class="swiper-slide conatiner">
                <img src="../images/ch.gif" alt="">
                <div class="home-text">
                    <span>Anime|Drama</span>
                    <h1>Bilibili</h1>
                    <span> Coming Soon </span>
                    <!-- <a href="#" class="btn">Watch Later</a>
                    <a href="#" class="play">
                        <i class='bx bx-play'>
                        </i> -->

                    </a>
                </div>
            </div>
            <!--Box 5-->

            <div class="swiper-slide conatiner">
                <img src="../images/marle.gif" alt="">
                <div class="home-text">
                    <span> Drama|Drame</span>
                    <h1>Taxi Driver <br></h1>
                    <span>Trending in 1976</span>
                    <!-- <a href="#" class="btn">Watch Later</a>
                    <a href="#" class="play">
                        <i class='bx bx-play'></i> -->

                    </a>
                </div>
            </div>
            <!--Box 6-->

            <div class="swiper-slide conatiner">
                <img src="../images/harry.gif" alt="">
                <div class="home-text">
                    <span> Action|Fantasy|Drama</span>
                    <h1>Harry Potter</h1>
                    <span>Room of rewards</span>
                    <!-- <a href="#" class="btn">Watch Later</a>
                    <a href="#" class="play">
                        <i class='bx bx-play'></i>

                    </a> -->
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>
    </section>
    <!--Movies-->



    <div style="background-color:antiquewhite; border:none;" id="google_translate_element"></div>






    <!-- 
///////////////////////////////////////////////////////////////////////////////////// -->





    <section class="Movies" id="Movies">
        <h2 class="heading">Suggestions for you </h2>
        <!--  Movies Container -->

        <div class="Movies-container">
            <!--Box 1-->
            <?php
            foreach ($list as $row) {
                $genre = $genreC->getType($row['IdG']);

                /**
                 * stocker les decenies dans $decades et supprimer les occureences
                 */
                array_push($decades, $row['decenie']);
                $decades = array_unique($decades);

            ?>
                <div class="box">
                    <div class="box-img">

                        <a href="<?php echo $row['lien']; ?>">
                            <img src="<?php echo $row['photo']; ?>"></a>




                    </div>
                    <h3><?php echo $row['titre'] ?> </h3>
                    <span><?php echo $row['duree'] ?> | <?php echo $genre['type']; ?> </span>
                    <div class="button">
                    <button class="btn btn-primary" ><a style="color:black ;" href="formation.php?titre=<?php echo $row['titre'] ?>">Resume</a></button>
                    <button class="btn btn-primary"  onclick="loadData(this.getAttribute('data-id'));" data-id="<?php echo $row['IdF']; ?>">
                         trailer
                    </button>
                    </div>
                </div>
            <?php
            }
            ?>


        </div>





    </section>

    <div class="container"></div>
    <section class="movies">

        <form method="POST" action="" class="filter-bar">
            <div class="filter-dropdowns">
                <select name="IdG" class="genre" id="">
                    <option value="">All genre</option>

                    <?php
                    foreach ($Genres as $row) {
                    ?>
                        <option value="<?php echo $row['IdG']; ?>"><?php echo $row['type']; ?></option>
                    <?php
                    }
                    ?>
                </select>


                <select name="decade" class="decade" id="">
                    <option value="">all Decades</option>
                    <?php
                    foreach ($decades as $row) {
                    ?>
                        <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="filter-radios">
                <input type="radio" name="grade" value="titre" id="featured" checked>
                <label for="featured">title</label>

                <input type="radio" name="grade" value="duree" id="popular">
                <label for="popular">duration</label>

                <input type="radio" name="grade" value="anneeR" id="newest">
                <label for="newest">year</label>

                <div class="checked-radio-bg"></div>

            </div>
            <div class="filter-submit">
                <button type="submit" name="ASC">
                    <i class="bi bi-sort-up"></i>
                </button>
                <button type="submit" name="DESC">
                    <i class="bi bi-sort-down"></i>
                </button>

            </div>

        </form>

    </section>
    <!--Categorie-->
    <section style="background-color:#f2dcaa;" class="Categorie" id="Categorie">
        <h2 class="heading">Filter</h2>
        <!--Coming container-->
        <div class="Categorie-container swiper ">
            <div class="swiper-wrapper">

                <?php
                foreach ($fimsFiltered as $row) {
                    $genre = $genreC->getType($row['IdG']);

                ?>
                    <div class="swiper-slide box">
                        <div class="box">
                           
                                <div class="box-img">

                                    <a href="<?php echo $row['lien']; ?>">
                                        <img src="<?php echo $row['photo']; ?>"></a>




                                </div>
                                <h3><?php echo $row['titre'] ?> </h3>
                                <span><?php echo $row['duree'] ?> | <?php echo $genre['type']; ?> </span>

                                <button style="background-color:transparent; border:none"><a style="color:black;" href="formation.php">About</a></button>
                            </div>
                        </div>
                    <?php
                }
                    ?>


                    </div>
            </div>

    </section>

    <!--  <div class="container"></div>
    <section class="movies">
        <div class="filter-bar">
            <div class="filter-dropdowns">
                <select name="genre" class="genre" id="">
                    <option value="all genre">All genre</option>
                    <option value="Action">Action</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Animal">Animal</option>
                    <option value="Animation">Animation</option>
                    <option value="biography"></option>
                </select>
                <select name="decades" class="decades" id="">
                    <option value="sixties">Sixtees</option>
                    <option value="seventies">seventies</option>
                    <option value="eighties">Adventure</option>
                    <option value="ninties">ninties</option>
                    <option value="two thousand">Animation</option>

                </select>
            </div>
            <div class="filter-radios">
                <input type="radio" name="grade" id="featured" checked>
                <label for="featured">featured</label>

                <input type="radio" name="grade" id="popular">
                <label for="popular">Popular</label>

                <input type="radio" name="grade" id="newest">
                <label for="newest">Newest</label>

                <div class="checked-radio-bg"></div>

            </div>
        </div>
    </section>-->


    <!--Footer-->
    <!--
<section class="footer">
    <a href="#" class="logo">
        <i class='bx bxs-movie'></i>Movies
    </a>
    <div class="social">
        <a href="#"><i class='bx bxl-facebook-circle'></i></a>
    </div>
</section>
-->

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>


            <div class="modal-header">
                <h4 class="modal-title">
                    Customer Detail
                </h4>

            </div>

            <div id="modal-body">
                Press ESC button to exit.
            </div>





        </div>

    </div>





    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="Film.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");


        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];



        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }




        function loadData(id) {
            $.ajax({
                url: "Film.php",
                method: "POST",
                data: {
                    get_data: 1,
                    id: id
                },
                success: function(response) {
                    response = JSON.parse(response);
                    console.log(response);

                    var html = "";
                    // Displaying trailer
                    //    html += "<div class='row'>";
                    html += '<iframe width="480" height="315" src="';
                    html += response.lien;
                    html += '"></i>';
                    //    html += "</div>";

                    // And now assign this HTML layout in pop-up body
                    $("#modal-body").html(html);

                    // And finally you can this function to show the pop-up/dialog
                    modal.style.display = "block";
                }
            });
        }
    </script>







<script   type="text/javascript">
             function googleTranslateElementInit() {
                 new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
             }
         </script>

         <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>









</body>

</html>