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

    if (update($_POST) > 0) {
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
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="header">
        <h2 class="h2">Virgi's</h2>
    </div>

    <section>
        <nav>
            <ul>
                <li><a href="index.html">Dashboard</a></li>
                <li><a href="../dosen/dosen.php">Dosen</a></li>
                <li><a class="active" href="mahasiswa.php">Mahasiswa</a></li>
                <li><a href="work.html">Jurusan</a></li>
                <li><a href="contact.html">Mata Kuliah</a></li>
                <li><a href="about.html">Ruangan</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="row">
            <div class="column3">
                <h1> Update Data Mahasiswa</h1>
                <form action="" method="POST">
                    <ul>
                        <li>
                            <label for="nim">NIM :</label><br>
                            <input type="number" name="nim" id="nim" required value="<?= $mhs["nim"];  ?>" readonly>
                        </li>
                        <li>
                            <label for="nama_mhs">Nama :</label> <br>
                            <input type="text" name="nama_mhs" id="nama_mhs" value="<?= $mhs["nama_mhs"]; ?>">
                        </li>
                        <li>
                            <label>Kode Jurusan :</label><br>
                            <select name="kode_jurusan">
                                <option value="J01">Sistem Komputer</option>
                                <option value="J02">Sistem Informasi</option>
                                <option value="J03">Bisnis Digital</option>
                            </select><br>
                        </li>
                        <li>
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
                        </li>
                        <li>
                            <label for="alamat">Alamat :</label><br>
                            <input type="text" name="alamat" id="alamat" value="<?= $mhs["alamat"]; ?>">
                        </li>
                        <li>
                            <label for=" no_hp">No HP :</label><br>
                            <input type="number" name="no_hp" id="no_hp" value="<?= $mhs["no_hp"]; ?>">
                        </li>
                        <li>
                            <label for=" email">Email :</label><br>
                            <input type="email" name="email" id="email" value="<?= $mhs["email"]; ?>">
                        </li>
                        <br>
                        <button type=" submit" name="submit">Update Data</button>
                    </ul>


                </form>
            </div>
        </div>
    </section>

    <footer>
        <p>Copyright &copy; Virgi Savita 2022</p>
    </footer>

</body>

</html>