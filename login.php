<?php
session_start();

if (isset($_SESSION["masuk"])) {
    header("Location: index.php");
    exit;
}
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
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>


    <h1>Halaman Login</h1>
    <?php
    if (isset($error)) : ?>
        <p style="color: red; font-style: italic;"> email/password salah </p>
    <?php endif;
    ?>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="masuk">Login</button>
            </li>
        </ul>
    </form>
</body>

</html>