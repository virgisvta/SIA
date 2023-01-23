<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}
require '../function.php';

$kodeJ = $_GET["kode_jurusan"];

$jurusan = query("SELECT * FROM data_jurusan WHERE `kode_jurusan` = '$kodeJ'")[0];

if (isset($_POST["submit"])) {

    if (updateJ($_POST) > 0) {
        echo "<script>
                alert('data berhasil diubah');
                document.location.href = 'jurusan.php';
            </script>";
    } else {
        echo mysqli_error($con);
        // echo "<script>
        // alert('data gagal diubah');
        // document.location.href = 'jurusan.php';
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
        <a href="../logout.php"><button class="btn btn-dark">Logout</button></a>
    </header>
    <div class="cntr px-5">
        <h1> Update Data Jurusan</h1>
    </div>
    <div class="mt-4 mb-5 px-4">
        <form action="" method="POST">
            <div class="form-control">

                <ul>
                    <label for="kode_jurusan">Kode Jurusan :</label><br>
                    <input type="text" name="kode_jurusan" id="kode_jurusan" value="<?= $jurusan["kode_jurusan"]; ?>" readonly><br>

                    <label for="nama_jurusan">Nama Jurusan :</label> <br>
                    <input type="text" name="nama_jurusan" id="nama_jurusan" value="<?= $jurusan["nama_jurusan"]; ?>">
                    <br><br>
                    <button class="btn btn-dark" type=" submit" name="submit">Update Data</button>
                </ul>
            </div>

        </form>
    </div>
    <div class="footer text-center">
        <p>Copyright &copy; 2022</p>
    </div>
</body>

</html>