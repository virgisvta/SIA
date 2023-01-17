<?php
require "function.php";

if (isset($_POST["register"])) {

    if (regis($_POST) > 0) {
        echo
        "<script>
            alert('User berhasil ditambahkan');
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
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email">
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="nama" name="nama" id="nama">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2">
            </li> <br>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>
</body>

</html>