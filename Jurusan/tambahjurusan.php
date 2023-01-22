<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}
require '../function.php';

if (isset($_POST["submit"])) {

    if (tambahJrs($_POST) > 0) {
        echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'jurusan.php';
            </script>";
    } else {
        // echo mysqli_error($con);
        echo "<script>
        alert('data gagal ditambahkan');
        document.location.href = 'jurusan.php';
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Jurusan</title>
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <!-- Menyisipkan JQuery dan Javascript Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

</head>

<body>
    <header>
        <img class="logo" src="../assets/skema.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">Mahasiswa</a></li>
                <li><a href="../dosen/dosen.php">Dosen</a></li>
                <li><a href="../jurusan/jurusan.php">Jurusan</a></li>
                <li><a href="../matakuliah/matakuliah.php">Matakuliah</a></li>
            </ul>
        </nav>
        <a href="../logout.php"><button class="btn btn-dark">Logout</button></a>
    </header>
    <div class="cntr px-5">
        <h1>Tambah Data Jurusan</h1>
    </div>
    <div class="mt-4 mb-5 px-4">
        <form action="" method="POST">
            <div class="form-control">
                <ul>
                    <label for="kode_jurusan">Kode Jurusan :</label> <br>
                    <input type="text" name="kode_jurusan" id="kode_jurusan">
                    <br>
                    <label for="nama_jurusan">Nama Jurusan :</label><br>
                    <input type="text" name="nama_jurusan" id="nama_jurusan">
                    <br><br>
                    <button type="submit" name="submit" class="btn btn-dark">Tambah Data</button>
                </ul>
        </form>
</body>

</html>