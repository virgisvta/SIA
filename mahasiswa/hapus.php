<?php
session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: login.php");
    exit;
}
require '../function.php';

$nim = $_GET['nim'];

if (hapus($nim) > 0) {
    echo "
    <script>
        alert('data berhasil dihapus');
        document.location.href = 'index.php';
    </script>


";
} else {
    echo
    // mysqli_error($con);
    "<script>
    alert('data gagal dihapus');
    document.location.href = 'index.php';
    </script>";
}
