<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}
require '../function.php';

$nim = $_GET["nim"];

$mhs = query("SELECT * FROM data_mahasiswa WHERE`nim` = '$nim'")[0];
// var_dump($mhs);

if (isset($_POST["submit"])) {

    if (updateMhs($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'mahasiswa.php';
            </script>
        ";
    } else {
        // echo mysqli_error($con);
        echo "<script>
        alert('data gagal diubah');
        document.location.href = 'mahasiswa.php';
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
    <title>About</title>
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
        <a href="../logout.php"><button class="btn2">Logout</button></a>
    </header>
    <h1 class="position-absolute top-30 start-50 translate-middle"> Tambah Data Dosen</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="POST" class="position-absolute top-80 start-30 translate-middle">
                    <div class="form-control"><!-- <div class="container"> -->
                        <ul>
                            <label for="nim">NIM :</label><br>
                            <input type="number" name="nim" id="nim" required value="<?= $mhs["nim"];  ?>" readonly> <br>
                            <label for="nama_mhs">Nama :</label> <br>
                            <input type="text" name="nama_mhs" id="nama_mhs" value="<?= $mhs["nama_mhs"]; ?>">
                            <br>
                            <label>Kode Jurusan :</label><br>
                            <select name="kode_jurusan">
                                <option value="J01">Sistem Komputer</option>
                                <option value="J02">Sistem Informasi</option>
                                <option value="J03">Bisnis Digital</option>
                            </select><br>

                            <label>Gender :</label><br>
                            <?php
                            if ($mhs['gender'] == 0) {
                            ?>
                                <input type="radio" name="gender" value="0" checked> Perempuan
                                <input type="radio" name="gender" value="1"> Laki-laki
                            <?php } else { ?>
                                <input type="radio" name="gender" value="0"> Perempuan
                                <input type="radio" name="gender" value="1" checked> Laki-laki
                            <?php } ?>
                            <br>
                            <label for="alamat">Alamat :</label><br>
                            <input type="text" name="alamat" id="alamat" value="<?= $mhs["alamat"]; ?>">
                            <br>
                            <label for=" no_hp">No HP :</label><br>
                            <input type="number" name="no_hp" id="no_hp" value="<?= $mhs["no_hp"]; ?>">
                            <br>
                            <label for=" email">Email :</label><br>
                            <input type="email" name="email" id="email" value="<?= $mhs["email"]; ?>">
                            <br><br>
                            <button type="submit" name="submit" class="btn btn-dark">Update Data</button>
                        </ul>


                </form>
            </div>
            <div class="col position-absolute top-70 start-30 translate-middle">
                Column2
            </div>
            <!-- <div class="col">
      Column
    </div> -->
        </div>
    </div>
    </div>

</body>

</html>