<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}
require '../function.php';

if (isset($_POST["submit"])) {

    if (tambahMatkul($_POST) > 0) {
        echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'matakuliah.php';
            </script>";
    } else {
        // echo mysqli_error($con);
        echo "<script>
        alert('data gagal ditambahkan');
        document.location.href = 'matakuliah.php';
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
    <title>Tambah Matakuliah</title>
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
                <li><a href="../mahasiswa/mahasiswa.php">Mahasiswa</a></li>
                <li><a href="../dosen/dosen.php">Dosen</a></li>
                <li><a href="../jurusan/jurusan.php">Jurusan</a></li>
                <li><a href="#">Matakuliah</a></li>
            </ul>
        </nav>
        <a href="../logout.php"><button class="btn2">Logout</button></a>
    </header>
    <div class="cntr px-5">
        <h1> Tambah Data Matakuliah</h1>
    </div>
    <div class="mt-4 mb-5 px-4">
        <form action="" method="POST">
            <div class="form-control">
                <ul>
                
                    <label for="nama_matkul">Nama Matakuliah:</label> <br>
                    <input type="text" name="nama_matkul" id="nama_matkul">
                    <br>
                
                    <label for="nidn">NIDN Dosen Matakuliah :</label><br>
                    <input type="text" name="nidn" id="nidn">
                    <br>
                
                    <label for="waktu">Waktu :</label><br>
                    <input type="time" name="waktu" id="waktu">
                    <br>
                
                    <label>Hari :</label><br>
                    <select name="hari">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select><br><br>
                <button class="btn btn-dark" type="submit" name="submit">Tambah Data</button>
            </ul>


        </form>
    </div>


</body>

</html>