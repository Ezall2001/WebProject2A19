<?php

include 'config.php';
// session_start();
$id = $_GET['id'];
if (isset($_POST['update_users'])) {

    $update_name = $_POST['update_name'];
    $update_email = $_POST['update_email'];
    $update_userType = $_POST['update_user_type'];

    mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$id'") or die('query failed');

    if (($update_userType != 'user') && ($update_userType != 'admin')) {
        $message[] = 'user Type can only be an Admin or User';
    } else {
        mysqli_query($conn, "UPDATE `user_form` SET user_type = '$update_userType' WHERE id = '$id'") or die('query failed');
    }

    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/' . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'image is too large';
        } else {
            $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$id'") or die('query failed');
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'image updated succssfully!';
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
    <title>update profile</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="update-profile">

        <?php
        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id= '$id'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <?php
            if ($fetch['image'] == '') {
                echo '<img src="images/default-avatar.png">';
            } else {
                echo '<img src="uploaded_img/' . $fetch['image'] . '">';
            }
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>
            <div class="flex">
                <div class="inputBox">
                    <span>name :</span>
                    <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
                    <span>user Type :</span>
                    <input type="text" name="update_user_type" value="<?php echo $fetch['user_type']; ?>" class="box">
                    <span>email :</span>
                    <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                    <span>update picture :</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">

                </div>

            </div>
            <input type="submit" value="update users" name="update_users" class="btn">
            <a href="view_user.php" class="delete-btn">go back</a>
        </form>

    </div>

</body>

</html>