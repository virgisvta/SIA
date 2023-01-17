<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}
require '../function.php';

if (isset($_POST["submit"])) {

    if (tambahJrs($_POST) > 0) {
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

            <li>
                <label for="kode_jurusan">Kode Jurusan :</label> <br>
                <input type="text" name="kode_jurusan" id="kode_jurusan">
            </li>
            <li>
                <label for="nama_jurusan">Nama Jurusan :</label><br>
                <input type="text" name="nama_jurusan" id="nama_jurusan">
            </li>
            <button type="submit" name="submit">Tambah Data</button>
        </ul>


    </form>
</body>

</html>