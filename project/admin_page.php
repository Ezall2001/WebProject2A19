<?php

include 'config.php';
session_start();
$user_id = $_SESSION['admin_id'];

if (!isset($user_id)) {
    header('location:login.php');
};

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="container">

        <div class="profile">
            <h2>ADMIN</h2>
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }
            if ($fetch['image'] == '') {
                echo '<img src="images/default-avatar.png">';
            } else {
                echo '<img src="uploaded_img/' . $fetch['image'] . '">';
            }
            ?>
            <h3><?php echo $fetch['name']; ?></h3>
            <a href="view_user.php" class="btn">View Users</a>
            <a href="admin_profile_update.php" class="btn">update profile</a>
            <a href="admin_page.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
            <script>
                src = ""
            </script>
        </div>

    </div>

</body>

</html>