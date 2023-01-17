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
</head>

<body>
    <h1> Tambah Matakuliah</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="id_matakuliah">ID MATAKULIAH :</label><br>
                <input type="number" name="id_matakuliah" id="id_matakuliah" required>
            </li>
            <li>
                <label for="nama_matakuliah">NAMA MATAKULIAH :</label> <br>
                <input type="text" name="nama_matakuliah" id="nama_matakuliah">
            </li>
            <li>
                <label for="dosen_matakuliah">DOSEN MATAKULIAH :</label><br>
                <input type="text" name="dosen_matakuliah" id="dosen_matakuliah">
            </li>
            <li>
                <label for="waktu">WAKTU :</label><br>
                <input type="number" name="waktu" id="waktu">
            </li>
            <li>
                <label for="hari">HARI :</label><br>
                <input type="text" name="hari" id="hari">
            </li>
            <br>
            <button type="submit" name="submit">Tambah Data</button>
        </ul>


    </form>
</body>

</html>