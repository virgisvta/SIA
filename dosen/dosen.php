<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}

require '../function.php';


$dsn = query("SELECT * FROM data_dosen ");
function search($keyword)
{
    $query = "SELECT * FROM data_dosen WHERE nama_dsn LIKE '%" . $keyword . "%'";
    return query($query);
}

if (isset($_POST["cari"])) {
    $dsn = search($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
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
        <h1>
            Daftar Dosen
        </h1>
        <div class="mt-4">

            <a class="btn btn-dark" href="tambahDsn.php">Tambah Data Dosen</a>
            <br><br>
            <form action="" method="post">
                <input type="text" name="keyword" size="40" autofocus placeholder="Masukan nama dosen" autocomplete="off">
                <button class="btn-dark" type="submit" name="cari"> Cari!</button>
            </form> <br>
        </div>
        <div class="mt-3 mb-5">
            <table border="2" cellpadding="30" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $i = 1;
                foreach ($dsn as $row) :
                ?>
                    <tr>
                        <td>
                            <?= $i++ ?>
                        </td>
                        <td>
                            <?= $row["nidn"]; ?>
                        </td>
                        <td>
                            <?= $row["nama_dsn"]; ?>
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
                            <a href="ubahDsn.php?nidn=<?= $row["nidn"]; ?>">Ubah</a>
                            <a href="hapus.php?nidn=<?= $row["nidn"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="footer text-center">
            <p>Copyright &copy; 2022</p>
        </div>

</body>

</html>