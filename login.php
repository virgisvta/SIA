<?php
// session_start();

// if (isset($_SESSION["masuk"])) {
//     header("Location: index.php");
//     exit;
// }
require "function.php";

if (isset($_POST["masuk"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($con, "SELECT * FROM petugas WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["masuk"] = true;
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="center">

        <h1> Login Page</h1>
        <?php
        if (isset($error)) : ?>
            <p class="alert"> Incorrect email or password </p>
        <?php endif;
        ?>

        <form action="" method="POST">
            <div class="txt_field">

                <label for="email">Input your email</label>
                <input type="email" name="email" id="email">
            </div>


            <div class="txt_field">
                <label for="password">Input your password </label>
                <input type="password" name="password" id="password">
            </div>

            <button type="submit" name="masuk" class="btn">Login</button>

            <br>
            <br>
            <button class="btn"> <a href="registrasi.php" class="btn"> Register</a></button>
        </form>

    </div>
</body>

</html>