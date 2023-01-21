<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: login.php");
    exit;
}
require '../function.php';

$id = $_GET['id_matakuliah'];

if (hapusMatkul($id) > 0) {
    echo "
    <script>
        alert('data berhasil dihapus');
        document.location.href = 'matakuliah.php';
    </script>


";
} else {
    echo
    // mysqli_error($con);
    "<script>
    alert('data gagal dihapus');
    document.location.href = 'matakuliah.php';
    </script>";
}
