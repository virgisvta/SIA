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


$mhs = query("SELECT * FROM data_mahasiswa ");
function search($keyword)
{
    $query = "SELECT * FROM data_mahasiswa WHERE nama_mhs LIKE '%" . $keyword . "%'";
    return query($query);
}

if (isset($_POST["cari"])) {
    $mhs = search($_POST["keyword"]);
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
        <a href="../logout.php"><button class="btn2">Logout</button></a>
    </header>
    <div class="cntr">
        <h1>
            Daftar Mahasiswa
        </h1>
        <!-- <div class="container"> -->
        <a href="tambahMhs.php">Tambah Data Mahasiswa</a>
        <form action="" method="post">
            <input type="text" name="keyword" size="40" autofocus placeholder="Masukan nama mahasiswa" autocomplete="off">
            <button type="submit" name="cari"> Cari!</button>
        </form> <br>
        <!-- </div> -->


        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Gender</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>

            <?php
            $i = 1;
            foreach ($mhs as $row) :
            ?>
                <tr>
                    <td>
                        <?= $i++ ?>
                    </td>
                    <td>
                        <?= $row["nim"]; ?>
                    </td>
                    <td>
                        <?= $row["nama_mhs"]; ?>
                    </td>
                    <td>
                        <?= $row["kode_jurusan"]; ?>
                    </td>
                    <td>
                        <?= $row["gender"]; ?>
                    </td>
                    <td>
                        <?= $row["alamat"]; ?>
                    </td>
                    <td>
                        <?= $row["no_hp"]; ?>
                    </td>
                    <td>
                        <?= $row["email"]; ?>
                    </td>
                    <td>
                        <a href="ubahMhs.php?nim=<?= $row["nim"]; ?>">Ubah</a>
                        <a href="hapus.php?nim=<?= $row["nim"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>



        <!-- <footer>
            <p>Copyright &copy; 2022</p>
        </footer> -->

</body>

</html>