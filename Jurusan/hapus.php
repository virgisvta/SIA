<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: login.php");
    exit;
}
require '../function.php';

$kode_jurusan = $_GET['kode_jurusan'];

if (hapusJ($kode_jurusan) > 0) {
    echo "
    <script>
        alert('data berhasil dihapus');
        document.location.href = 'jurusan.php';
    </script>


";
} else {
    echo
    // mysqli_error($con);
    "<script>
    alert('data gagal dihapus');
    document.location.href = 'jurusan.php';
    </script>";
}
