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
</head>

<body>
    <div class="center">

    
    <h1> Tambah Data Mahasiswa</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="nim">NIM :</label><br>
                <input type="number" name="nim" id="nim" required>
            </li>
            <li>
                <label for="nama_mhs">Nama :</label> <br>
                <input type="text" name="nama_mhs" id="nama_mhs">
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
                <input type="radio" name="gender" value="0"> Perempuan
                <input type="radio" name="gender" value="1"> Laki-laki
                <br>
            </li>
            <li>
                <label for="alamat">Alamat :</label><br>
                <input type="text" name="alamat" id="alamat">
            </li>
            <li>
                <label for="no_hp">No HP :</label><br>
                <input type="number" name="no_hp" id="no_hp">
            </li>
            <li>
                <label for="email">Email :</label><br>
                <input type="email" name="email" id="email">
            </li>
            <br>
            <button type="submit" name="submit">Tambah Data</button>
        </ul>


    </form>
    </div>
</body>

</html>