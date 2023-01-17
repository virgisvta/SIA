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
                document.location.href = 'jurusan.php';
            </script>";
    } else {
        // echo mysqli_error($con);
        echo "<script>
        alert('data gagal ditambahkan');
        document.location.href = 'jurusan.php';
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
    <title>Tambah Data Jurusan</title>
</head>

<body>
    <h1> Tambah Data Jurusan</h1>
    <form action="" method="POST">
        <ul>
            </li>
            <li>
                <label for="nama_Jurusan">Nama Jurusan :</label> <br>
                <input type="text" name="nama_jurusan" id="nama_jurusan">
            </li>
            <li>
                <label>Kode Jurusan :</label><br>
                <select name="kode_jurusan">
                    <option value="J01">Sistem Komputer</option>
                    <option value="J02">Sistem Informasi</option>
                    <option value="J03">Bisnis Digital</option>
                </select>
            <button type="submit" name="submit">Tambah Data</button>
        </ul>


    </form>
</body>

</html>