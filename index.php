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
    <div class="header">
        <h2 class="h2">Virgi's</h2>
    </div>

    <section>
        <nav>
            <ul>
                <li><a class="active" href="#">Dashboard</a></li>
                <li><a href="dosen/dosen.php">Dosen</a></li>
                <li><a href="mahasiswa/mahasiswa.php">Mahasiswa</a></li>
                <li><a href="jurusan/jurusan.php">Jurusan</a></li>
                <li><a href="matakuliah/matakuliah.php">Mata Kuliah</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="row">
            <!-- <div class="column2">
                <img src="assets/home.jpeg" alt="image" class="img" style="margin-left:30%; margin-top: 10%;">
            </div> -->
            <div class="column3">
                <h1 style="font-size: 20pt; padding-top: 60px"> Hallo, saya Virgi Savita</h1>
                <hr style="width: 30%; border: 2px solid #555; text-align:left;margin-left:0">
                <p id="demo"></p>
                <button class="btn1" onclick="btn()">More Info</button>
            </div>
        </div>
    </section>

    <footer>
        <p>Copyright &copy; Virgi Savita 2022</p>
    </footer>

</body>

</html>