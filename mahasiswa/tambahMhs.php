<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}
require '../function.php';

if (isset($_POST["submit"])) {

    if (tambahMhs($_POST) > 0) {
        echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'mahasiswa.php';
            </script>";
    } else {
        // echo mysqli_error($con);
        echo "<script>
        alert('data gagal ditambahkan');
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
    <title>Tambah Data Mahasiswa</title>
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
        <a href="../logout.php"><button class="btn2">Logout</button></a>
    </header>
    <div class="cntr px-5">
        <h1> Tambah Data mahasiswa</h1>
    </div>
    <div class="mt-4 mb-5 px-4">
        <form action="" method="POST">
            <div class="form-control">
                <ul>

                    <label for="nim">NIM :</label><br>
                    <input type="number" name="nim" id="nim" required>
                    <br>

                    <label for="nama_mhs">Nama :</label> <br>
                    <input type="text" name="nama_mhs" id="nama_mhs" required>
                    <br>

                    <label>Kode Jurusan :</label><br>
                    <select name="kode_jurusan" required>
                        <option value="J01">Sistem Komputer</option>
                        <option value="J02">Sistem Informasi</option>
                        <option value="J03">Bisnis Digital</option>
                    </select>
                    <br>

                    <label>Gender :</label><br>
                    <input type="radio" name="gender" value="0"> Perempuan
                    <input type="radio" name="gender" value="1"> Laki-laki
                    <br>
                    <label for="alamat">Alamat :</label><br>
                    <input type="text" name="alamat" id="alamat">
                    <br>
                    <label for="no_hp">No HP :</label><br>
                    <input type="number" name="no_hp" id="no_hp" required>
                    <br>
                    <label for="email">Email :</label><br>
                    <input type="email" name="email" id="email" required>
                    <br>
                    <br>
                    <button class="btn btn-dark" type="submit" name="submit">Tambah Data</button>
                </ul>


        </form>
    </div>
    <div class="footer text-center">
        <p>Copyright &copy; 2022</p>
    </div>
</body>

</html>