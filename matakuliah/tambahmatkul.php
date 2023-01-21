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
                <label for="nama_matakuliah">Nama Matakuliah:</label> <br>
                <input type="text" name="nama_matakuliah" id="nama_matakuliah">
            </li>
            <li>
                <label for="nidn">NIDN Dosen Matakuliah :</label><br>
                <input type="text" name="nidn" id="nidn">
            </li>
            <li>
                <label for="waktu">Waktu :</label><br>
                <input type="time" name="waktu" id="waktu">
            </li>
            <li>
                <label>Hari :</label><br>
                <select name="hari">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                </select><br>
            </li>
            <br>
            <button type="submit" name="submit">Tambah Data</button>
        </ul>


    </form>
</body>

</html>