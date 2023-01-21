<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}

require "function.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <img class="logo" src="assets/skema.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="#">Home</a></li>
                <li><a href="mahasiswa/mahasiswa.php">Mahasiswa</a></li>
                <li><a href="dosen/dosen.php">Dosen</a></li>
                <li><a href="jurusan/jurusan.php">Jurusan</a></li>
                <li><a href="matakuliah/matakuliah.php">Matakuliah</a></li>
            </ul>
        </nav>
        <a href="logout.php"><button class="btn2">Logout</button></a>
    </header>

    <div class="center">
        <h1>Welcome to SKEMA !</h1>
        <p style="font-size: 16px; text-align: center; font-family: 'Courier New', Courier, monospace;">Sistem Kepo Mahasiswa</p>
    </div>
</body>

</html>