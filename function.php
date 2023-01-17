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

    $query = "INSERT INTO data_mahasiswa (`nidn`, `nama_dsn`, `gender`, `alamat`, `no_hp`, `email`) VALUES ('$nidn','$nama','$gender','$alamat','$no_hp','$email')";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}


function update($data)
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


function hapus($nim)
{
    global $con;
    mysqli_query($con, "DELETE FROM data_mahasiswa WHERE `nim` = '$nim' ");

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
