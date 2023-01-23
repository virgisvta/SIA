<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}
require '../function.php';

$id = $_GET['id_matkul'];

$matkul = query("SELECT * FROM data_matkul WHERE `id_matkul` = '$id'")[0];

if (isset($_POST["submit"])) {

    if (updateMatkul($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'matakuliah.php';
            </script>
        ";
    } else {
        echo mysqli_error($con);
        // echo "<script>
        // alert('data gagal diubah');
        // document.location.href = 'matakuliah.php';
        // </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Matakuliah</title>
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
                <li><a href="../matakuliah/matakuliah.php">Matakuliah</a></li>
            </ul>
        </nav>
        <a href="#"><button class="btn2">Logout</button></a>
    </header>
    <div class="cntr px-5">
        <h1> Update Data Mahasiswa</h1>
    </div>
    <div class="mt-4 mb-5 px-4">
        <form action="" method="POST">
            <div class="form-control">
                <ul>

                    <label for="nama_matkul">Nama Matakuliah :</label><br>
                    <input type="text" name="nama_matkul" id="nama_matkul" value="<?= $matkul["nama_matkul"];  ?>">
                    <br>
                    <label for="nidn">NIDN :</label> <br>
                    <input type="text" name="nidn" id="nidn" value="<?= $matkul["nidn"]; ?>">
                    <br>
                    <label for="waktu">Waktu :</label><br>
                    <input type="time" name="waktu" id="waktu" value="<?= $matkul["waktu"]; ?>">
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
                    <button class="btn btn-dark" submit" name="submit">Update Data</button>
                </ul>

            </div>
        </form>

    </div>
    <div class="footer text-center">
        <p>Copyright &copy; 2022</p>
    </div>


</body>

</html>