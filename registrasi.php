<?php
require "function.php";

if (isset($_POST["register"])) {

    if (regis($_POST) > 0) {
        echo
        "<script>
            alert('User berhasil ditambahkan');
            document.location.href = 'login.php';
        </script>";
    } else {
        echo mysqli_error($con);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <div class="center">


        <h1>Registration Page</h1>
        <form action="" method="POST">
            <div class="txt_field">
                <input type="email" name="email" id="email" required placeholder="Input your email">
            </div>
            <div class="txt_field">
                <input type="nama" name="nama" id="nama" required placeholder="Input your name">
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" required placeholder="Input your password">
            </div>
            <div class="txt_field">
                <input type="password" name="password2" id="password2" required placeholder="Confirm password">
            </div>
            <button type="submit" name="register" class="btn btn-dark">Register</button>
        </form>
    </div>
</body>

</html>