<?php

$con = mysqli_connect("localhost", "root", "", "db_data_akademik");

function query($query)
{
    global $con;
    $result = mysqli_query($con, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahMhs($data)
{
    global $con;
    $nim = htmlspecialchars($data['nim']);
    $nama =  htmlspecialchars($data['nama_mhs']);
    $kode_jurusan = htmlspecialchars($data['kode_jurusan']);
    $gender = htmlspecialchars($data['gender']);
    $alamat =  htmlspecialchars($data['alamat']);
    $no_hp =  htmlspecialchars($data['no_hp']);
    $email = htmlspecialchars($data['email']);

    $query = "INSERT INTO data_mahasiswa (`nim`, `nama_mhs`, `kode_jurusan`, `gender`, `alamat`, `no_hp`, `email`) VALUES ('$nim','$nama','$kode_jurusan','$gender','$alamat','$no_hp','$email')";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function tambahDsn($data)
{
    global $con;
    $nidn = htmlspecialchars($data['nidn']);
    $nama =  htmlspecialchars($data['nama_dsn']);
    $gender = htmlspecialchars($data['gender']);
    $alamat =  htmlspecialchars($data['alamat']);
    $no_hp =  htmlspecialchars($data['no_hp']);
    $email = htmlspecialchars($data['email']);

    $query = "INSERT INTO data_dosen (`nidn`, `nama_dsn`, `gender`, `alamat`, `no_hp`, `email`) VALUES ('$nidn','$nama','$gender','$alamat','$no_hp','$email')";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function tambahJrs($data)
{
    global $con;
    $kodej = htmlspecialchars($data['kode_jurusan']);
    $namaj =  htmlspecialchars($data['nama_jurusan']);

    $query = "INSERT INTO data_jurusan (`kode_jurusan`, `nama_jurusan`) VALUES ('$kodej','$namaj')";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function tambahMatkul($data)
{
    global $con;
    $nama_matkul =  htmlspecialchars($data['nama_matakuliah']);
    $dosen = htmlspecialchars($data['nidn']);
    $waktu =  htmlspecialchars($data['waktu']);
    $hari = htmlspecialchars($data['hari']);

    $query = "INSERT INTO mata_kuliah ( `nama_matakuliah`, `nidn`, `waktu`, `hari`) VALUES ('$nama_matkul','$dosen','$waktu','$hari')";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}


function updateMhs($data)
{
    global $con;
    $nim = htmlspecialchars($data['nim']);
    $nama =  htmlspecialchars($data['nama_mhs']);
    $kode_jurusan = htmlspecialchars($data['kode_jurusan']);
    $gender = htmlspecialchars($data['gender']);
    $alamat =  htmlspecialchars($data['alamat']);
    $no_hp =  htmlspecialchars($data['no_hp']);
    $email = htmlspecialchars($data['email']);

    $query = "UPDATE data_mahasiswa SET 
                `nim` = '$nim', 
                `nama_mhs` = '$nama', 
                `kode_jurusan` = '$kode_jurusan', 
                `gender` = $gender, 
                `alamat` = '$alamat', 
                `no_hp` = '$no_hp', 
                `email` = '$email'
                WHERE `nim` = '$nim'
                ";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function updateDsn($data)
{
    global $con;
    $nim = htmlspecialchars($data['nidn']);
    $nama =  htmlspecialchars($data['nama_dsn']);
    $gender = htmlspecialchars($data['gender']);
    $alamat =  htmlspecialchars($data['alamat']);
    $no_hp =  htmlspecialchars($data['no_hp']);
    $email = htmlspecialchars($data['email']);

    $query = "UPDATE data_dosen SET 
                `nim` = '$nim', 
                `nama_dsn` = '$nama',  
                `gender` = $gender, 
                `alamat` = '$alamat', 
                `no_hp` = '$no_hp', 
                `email` = '$email'
                WHERE `nim` = '$nim'
                ";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function updateJ($data)
{
    global $con;
    $kodeJ = htmlspecialchars($data['kode_jurusan']);
    $namaJ =  htmlspecialchars($data['nama_jurusan']);

    $query = "UPDATE data_jurusan SET 
                `kode_jurusan` = '$kodeJ', 
                `nama_jurusan` = '$namaJ'
                WHERE `kode_jurusan` = '$kodeJ'
                ";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function updateMatkul($matkul)
{
    global $con;

    $nama_matkul = htmlspecialchars($matkul['nama_matakuliah']);
    $nidn =  htmlspecialchars($matkul['nidn']);
    $waktu = htmlspecialchars($matkul['waktu']);
    $hari = htmlspecialchars($matkul['hari']);
    $id = $matkul['id_matakuliah'];

    $query = "UPDATE mata_kuliah SET 
                `nama_matakuliah` = '$nama_matkul', 
                `nidn` = '$nidn', `waktu` = '$waktu', `hari` = '$hari'
                WHERE `id_matakuliah` = '$id'
                ";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function hapus($nim)
{
    global $con;
    mysqli_query($con, "DELETE FROM data_mahasiswa WHERE `nim` = '$nim' ");

    return mysqli_affected_rows($con);
}

function hapusD($nidn)
{
    global $con;
    mysqli_query($con, "DELETE FROM data_dosen WHERE `nidn` = '$nidn' ");

    return mysqli_affected_rows($con);
}

function hapusJ($kode_jurusan)
{
    global $con;
    mysqli_query($con, "DELETE FROM data_jurusan WHERE `kode_jurusan` = '$kode_jurusan' ");

    return mysqli_affected_rows($con);
}

function hapusMatkul($id)
{
    global $con;
    mysqli_query($con, "DELETE FROM mata_kuliah WHERE `id_matakuliah` = '$id' ");

    return mysqli_affected_rows($con);
}

function regis($data)
{
    global $con;
    $email = $data["email"];
    $nama = $data["nama"];
    $password = mysqli_real_escape_string($con, $data["password"]);
    $password2 = mysqli_real_escape_string($con, $data["password2"]);


    $result = mysqli_query($con, "SELECT email FROM petugas WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Email yang dipilih sudah terdaftar');
        </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
        alert('Konfirmasi password tidak sesuai');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($con, "INSERT INTO petugas VALUES('', '$email', '$nama', '$password')");

    return mysqli_affected_rows($con);
}
