<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: ../login.php");
    exit;
}

require '../function.php';

//pagination
// $jmldata = 2;
// $data = count(query("SELECT * FROM data_jurusan"));
// $halaman = ceil($data / $jmldata);


$jurusan = query("SELECT * FROM data_jurusan ");
function search($keyword)
{
    $query = "SELECT * FROM data_jurusan WHERE nama_jurusan LIKE '%" . $keyword . "%'";
    return query($query);
}

if (isset($_POST["cari"])) {
    $jurusan = search($_POST["keyword"]);
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
   
    </div>

    <section>
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
                Daftar Jurusan
            </h1>

            <a href="tambahjurusan.php">Tambah Data Jurusan</a>
            <br><br>
            <div class="column3">
                <form action="" method="post">

                    <input type="text" name="keyword" size="40" autofocus placeholder="Masukan nama jurusan" autocomplete="off">
                    <button type="submit" name="cari"> Cari!</button>
                </form> <br>

                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Kode_Jurusan</th>
                        <th>Nama_Jurusan</th>
                        <th>Aksi</th>

                    </tr>

                    <?php
                    $i = 1;
                    foreach ($jurusan as $row) :
                    ?>
                        <tr>
                            <td>
                                <?= $i++ ?>
                            </td>
                            <td>
                                <?= $row["kode_jurusan"]; ?>
                            </td>
                            <td>
                                <?= $row["nama_jurusan"]; ?>
                            </td>
                            <td>
                                <a href="ubahjurusan.php?kode_jurusan=<?= $row["kode_jurusan"]; ?>">Ubah</a>
                                <a href="hapus.php?kode_jurusan=<?= $row["kode_jurusan"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

</body>

</html>