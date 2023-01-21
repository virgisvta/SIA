<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}

require '../function.php';

//pagination
// $jmldata = 2;
// $data = count(query("SELECT * FROM data_mahasiswa"));
// $halaman = ceil($data / $jmldata);


$matakuliah = query("SELECT * FROM data_matkul ");
function search($keyword)
{
    $query = "SELECT * FROM data_matkul WHERE nama_matkul LIKE '%" . $keyword . "%'";
    return query($query);
}

if (isset($_POST["cari"])) {
    $matakuliah = search($_POST["keyword"]);
}
var_dump($matakuliah);
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
    <header>
        <img class="logo" src="../assets/skema.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../mahasiswa/mahasiswa.php">Mahasiswa</a></li>
                <li><a href="../dosen/dosen.php">Dosen</a></li>
                <li><a href="../jurusan/jurusan.php">Jurusan</a></li>
                <li><a href="#">Matakuliah</a></li>
            </ul>
        </nav>
        <a href="../logout.php"><button class="btn2">Logout</button></a>
    </header>
    <div class="row">
        <h1>
            Daftar Matakuliah
        </h1>

        <a href="tambahmatkul.php">Tambah Data Matakuliah</a>
        <form action="" method="post">

            <input type="text" name="keyword" size="40" autofocus placeholder="Masukan nama matakuliah" autocomplete="off">
            <button type="submit" name="cari"> Cari!</button>
        </form> <br>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama_Matakuliah</th>
                <th>Dosen_Matakuliah</th>
                <th>Waktu</th>
                <th>Hari</th>
                <th>Aksi</th>
            </tr>

            <?php
            $i = 1;
            foreach ($matakuliah as $row) :
            ?>
                <tr>
                    <td>
                        <?= $i++ ?>
                    </td>
                    <td>
                        <?= $row["nama_matkul"]; ?>
                    </td>
                    <td>
                        <?= $row["nidn"]; ?>
                    </td>
                    <td>
                        <?= $row["waktu"]; ?>
                    </td>
                    <td>
                        <?= $row["hari"]; ?>
                    </td>
                    <td>
                        <a href="ubahmatkul.php?id_matkul=<?= $row["id_matkul"]; ?>">Ubah</a>
                        <a href="hapus.php?id_matkul=<?= $row["id_matkul"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- <footer>
        <p>Copyright &copy; 2022</p>
    </footer> -->

</body>

</html>