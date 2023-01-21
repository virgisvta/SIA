<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}
require '../function.php';

$nidn = $_GET["nidn"];

$dosen = query("SELECT * FROM data_dosen WHERE`nidn` = '$nidn'")[0];
// var_dump($mhs);

if (isset($_POST["submit"])) {

    if (updateDsn($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'dosen.php';
            </script>
        ";
    } else {
        echo mysqli_error($con);
        // echo "<script>
        // alert('data gagal diubah');
        // document.location.href = 'dosen.php';
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
    <div class="row">
        <div class="column3">
            <h1> Update Data Dosen</h1>
            <form action="" method="POST">
                <ul>
                    <li>
                        <label for="nidn">NIDN :</label><br>
                        <input type="number" name="nidn" id="nidn" required value="<?= $dosen["nidn"];  ?>" readonly>
                    </li>
                    <li>
                        <label for="nama_dsn">Nama :</label> <br>
                        <input type="text" name="nama_dsn" id="nama_dsn" value="<?= $dosen["nama_dsn"]; ?>">
                    </li>
                    <li>
                        <label>Gender :</label><br>
                        <?php
                        if ($dosen['gender'] == 0) {
                        ?>
                            <input type="radio" name="gender" value="0" checked> Perempuan
                            <input type="radio" name="gender" value="1"> Laki-laki
                        <?php } else { ?>
                            <input type="radio" name="gender" value="0"> Perempuan
                            <input type="radio" name="gender" value="1" checked> Laki-laki
                        <?php } ?>
                    </li>
                    <li>
                        <label for="alamat">Alamat :</label><br>
                        <input type="text" name="alamat" id="alamat" value="<?= $dosen["alamat"]; ?>">
                    </li>
                    <li>
                        <label for=" no_hp">No HP :</label><br>
                        <input type="number" name="no_hp" id="no_hp" value="<?= $dosen["no_hp"]; ?>">
                    </li>
                    <li>
                        <label for=" email">Email :</label><br>
                        <input type="email" name="email" id="email" value="<?= $dosen["email"]; ?>">
                    </li>
                    <br>
                    <button type=" submit" name="submit">Update Data</button>
                </ul>


            </form>
        </div>
    </div>
    </section>

    <footer>
        <p>Copyright &copy; 2022</p>
    </footer>

</body>

</html>