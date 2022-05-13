<?php
include 'config.php';
if (isset($_POST) & !empty($_POST)) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email'");
    if (mysqli_num_rows($select) == 1) {
        $row = mysqli_fetch_assoc($select);
        $password = $row['password'];
        $to = $row['email'];
        $subject = "Your Recovered Password";
        $msg = "Please use this password to login " . $password;
        $headers = "From: Chronical@decades.tn";
        if (mail($to, $subject, $msg, $headers)) {
            $message[] = "Your Password has been sent to your email id";
        } else {

            $message[] = "Failed to Recover your password, try again";
        }
    } else {
        $message[] = "User name does not exist in database";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Password Reset </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <center>
        <br><br>
        <form class="login-form" action="enter_email.php" method="post">
            <h2 class="form-title">Reset password</h2>
            <br>
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>
            <div class="form-group">
                <label>Your email address : </label>
                <input type="email" name="email" required>

                <button type="submit" name="reset-password" class="btn">Submit</button>
                <a href="login.php" class="delete-btn">go back</a>
            </div>
        </form>
    </center>
</body>

</html>