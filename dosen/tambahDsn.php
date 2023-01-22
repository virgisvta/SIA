<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}
require '../function.php';

if (isset($_POST["submit"])) {

    if (tambahDsn($_POST) > 0) {
        echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'dosen.php';
            </script>";
    } else {
        // echo mysqli_error($con);
        echo "<script>
        alert('data gagal ditambahkan');
        document.location.href = 'dosen.php';
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
    <title>Tambah Data Dosen</title>
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
        <h1> Tambah Data Dosen</h1>
    </div>
    <div class="mt-4 mb-5 px-4">
        <form action="" method="POST">
            <div class="form-control">
                <ul>

                    <label for="nidn">NIDN :</label class=""><br>
                    <input type="number" name="nidn" id="nidn" required class="">

                    <br>


                    <label for="nama_dsn">Nama :</label> <br>
                    <input type="text" name="nama_dsn" id="nama_dsn">
                    <br>

                    <label>Gender :</label> <br><br>
                    <input type="radio" name="gender" value="0"> Perempuan
                    <input type="radio" name="gender" value="1"> Laki-laki
                    <br><br>
                    <!-- </li> -->
                    <!-- <li> -->
                    <label for="alamat">Alamat :</label><br>
                    <input type="text" name="alamat" id="alamat">
                    <br>
                    <!-- </li>
            <li> -->
                    <label for="no_hp">No HP :</label><br>
                    <input type="number" name="no_hp" id="no_hp">
                    <br>
                    <!-- </li>
            <li> -->
                    <label for="email">Email :</label><br>
                    <input type="email" name="email" id="email">
                    <!-- </li> -->
                    <br>
                    <br>
                    <button type="submit" name="submit" class="btn btn-dark">Tambah Data</button>

                </ul>
            </div>

        </form>


</body>

</html>