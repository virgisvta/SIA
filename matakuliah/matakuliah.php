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


$matakuliah = query("SELECT * FROM mata_kuliah ");
function search($keyword)
{
    $query = "SELECT * FROM mata_kuliah WHERE mata_kuliah LIKE '%" . $keyword . "%'";
    return query($query);
}

if (isset($_POST["cari"])) {
    $matakuliah = search($_POST["keyword"]);
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
                <li><a href="../index.php">Dashboard</a></li>
                <li><a href="../dosen/dosen.php">Dosen</a></li>
                <li><a href="../mahasiswa/mahasiswa.php">Mahasiswa</a></li>
                <li><a href="../jurusan/jurusan.php">Jurusan</a></li>
                <li><a class="active" href="#">Mata Kuliah</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="row">
            <h1>
                Daftar Matakuliah
            </h1>

            <a href="tambahmatkul.php">Tambah Data Matakuliah</a>
            <br><br>
            <div class="column3">
                <form action="" method="post">

                    <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan nama matakuliah" autocomplete="off">
                    <button type="submit" name="cari"> Cari!</button>
                </form> <br>

                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Id_Matakuliah</th>
                        <th>Nama_Matakuliah</th>
                        <th>Dosen_Matakuliah</th>
                        <th>Waktu</th>
                        <th>Hari</th>
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
                                <?= $row["id_matakuliah"]; ?>
                            </td>
                            <td>
                                <?= $row["nama_matakuliah"]; ?>
                            </td>
                            <td>
                                <?= $row["dosen_matakuliah"]; ?>
                            </td>
                            <td>
                                <?= $row["waktu"]; ?>
                            </td>
                            <td>
                                <?= $row["hari"]; ?>
                            </td>
                            <td>
                                <a href="ubahmatkul.php?id_matakuliah=<?= $row["id_matakuliah"]; ?>">Ubah</a>
                                <a href="hapus.php?id_matakuliah=<?= $row["id_matakuliah"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

    <footer>
        <p>Copyright &copy; Virgi Savita 2022</p>
    </footer>

</body>

</html>