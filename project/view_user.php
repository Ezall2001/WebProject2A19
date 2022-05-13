<?php

include 'config.php';
session_start();
$user_id = $_SESSION['admin_id'];
$results = mysqli_query($conn, "SELECT * FROM user_form ");
// $message = '';
if (isset($_POST['submit'])) {
    // $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $userType = mysqli_real_escape_string($conn, $_POST['userType']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;


    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $message[] = 'user already exist';
    } else {
        if ($userType != 'admin' && $userType != 'user') {
            $message[] = 'Check User Type Admin or User only !';
        } else if ($pass != $cpass) {
            $message[] = 'confirm password not matched!';
        } else if ($image_size > 2000000) {
            $message[] = 'image size is too large!';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image, user_type) VALUES('$name', '$email', '$pass', '$image', '$userType')") or die('query failed');

            if ($insert) {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'registered successfully!';
                header('location:view_user.php');
            } else {
                $message[] = 'registeration failed!';
            }
        }
    }
}

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
<link rel="stylesheet" href="../Public/style/css/global.css">
<link rel="stylesheet" href="../Public/style/css/admin.css">  
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


<nav class="logo">
  <div class="logo-container">
    <div class="outer-frame"></div>
    <div class="outer-mask"></div>
    <div class="inner-frame"></div>
    <div class="inner-mask"></div>
    <img src="../Public/assets/icons/sandClock.png">
    <div class="name"><span>decades chronicals</span></div>
    <div class="background"></div>
  </div>
</nav>


<header>

  <div class="logo-placeholder"></div>

  <div class="nav-wrapper">
    <nav>
      <ul class="page-nav">
        <!-- TODO: do a smooth scrolling -->

      

        

          <li class="nav-item">
          <a href="">Home<span class="mask">Home</span></a>
        </li>

          <li class="nav-item">
          <a href="/pages/films">Films<span class="mask">Films</span></a>
        </li>

        <li class="nav-item">
          <a href="">Music<span class="mask">Music</span></a>
        </li>
        

        




      </ul>
    </nav>
  </div>



  <!-- TODO: add the account info if logged in -->
  <div class="account-nav-wrapper">
    <div class="account-nav">

      <div class="logged-out">
        <a href="admin_page.php?logout=<?php echo $_SESSION['admin_id']; ?>"><button class="login">logout</button></a>
        <div class="mask"></div>
      </div>

      <div class="logged-in">

      </div>

    </div>
  </div>

</header>
<body>


<aside class="side-nav">
  <nav>
    <li>Users</li>
   <a href="back/listeFilm.php"> <li>Films</li></a>
    <li>Music</li>
    <li>Forums</li>
  </nav>
</aside>

    <center>
        <h2>Users Management</h2>
    </center>
    <input style=float:right type="button" value="add User OR Admin" class=btn id="modal-btn">
    <a href="admin_page.php" class="delete-btn">go back</a>
    <div class="popupRegistre" id="popupRegistre">
        <form action="" method="post" enctype="multipart/form-data" class="popUpForm">
            <h2>Add User</h2>

            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>
            <input type="hidden" name="id">
            <br>
            <label for="Name">Name: </label><br>
            <input type="text" name="name" placeholder="enter name" class="box" required><br>

            <label for="Email">Email: </label><br>
            <input type="email" name="email" placeholder="enter email" class="box" required><br>

            <label for="Password">Password: </label><br>
            <input type="password" name="password" placeholder="enter password" class="box" required><br>

            <label for="Password">Confirm Password: </label><br>
            <input type="password" name="cpassword" placeholder="confirm password" class="box" required><br>

            <label for="image">Profile Picture: </label><br>
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png"><br>

            <label for="userType">Admin or User: </label><br>
            <input type="text" name="userType" placeholder="userType" class="box" required><br>

            <input type="submit" name="submit" value="Add User" class="btn">

        </form>

    </div>
    <br><br>
    <center>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($results)) {
                ?>

                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['user_type']; ?></td>
                        <td>
                            <a href="update_users.php?id=<?php echo $row['id']; ?> " class="btn">Edit</a>
                        </td>
                        <td>
                            <a href="delete_users.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure ?' )" class="btn">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </center>
    <script src="addUser.js"></script>
</body>

</html>