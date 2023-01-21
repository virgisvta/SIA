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
                <li><a href="../jurusan/jurusan.php">Jurusan</a></li>
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
                            <label for="kode_jurusan">Kode Jurusan :</label>
                            <input type="text" name="kode_jurusan" id="kode_jurusan" value="<?= $jurusan["kode_jurusan"]; ?>" readonly>
                        </li>
                        <li>
                            <label for="nama_jurusan">Nama Jurusan :</label> <br>
                            <input type="text" name="nama_jurusan" id="nama_jurusan" value="<?= $jurusan["nama_jurusan"]; ?>">
                        </li>

                        <button type="submit" name="submit">Update Data</button>
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