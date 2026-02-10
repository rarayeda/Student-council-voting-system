<?php
// Koneksi ke basis data
require "connect.php";
// Mendapatkan data dari form login
$nisn = $_POST['nisn'];

// Melakukan query ke basis data untuk memeriksa kecocokan data login
$query = "SELECT * FROM data_siswa WHERE nisn='$nisn'";
$data = $connect->prepare($query);
// $data->bindParam(1, $nisn);
$data->execute();
$result = $data->fetch(PDO::FETCH_OBJ);

// var_dump($result, $query);
// die;


if ($result) {
    // var_dump($result);
    // die;
    // Login berhasil
    session_start();
    $_SESSION['nisn'] = $nisn;
    $_SESSION['nama'] = $result->nama_siswa;
    $_SESSION['kelas'] = $result->kelas_siswa;
    header("Location: indentify.php"); // Ganti dengan halaman setelah login sukses
} else {
    // Login gagal
    echo "<script>
    alert ('Nisn Tidak Ditemukan, coba lagi!');
    window.location= 'index.php';
    </script>";
}

// $connect->
