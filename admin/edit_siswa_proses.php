<?php
require "connect.php";
if (isset($_POST['edit'])) {
    $query = "UPDATE data_siswa SET nisn=?, nama_siswa=?, kelas_siswa=? WHERE id=?";
    $data = $connect->prepare($query);
    $data->bindParam(1, $_POST['nisn']);
    $data->bindParam(2, $_POST['nama']);
    $data->bindParam(3, $_POST['kelas']);
    $data->bindParam(4, $_POST['id']);
    $data->execute();


    $berhasil = $data->execute();

    if ($berhasil) {
        header("Location: siswa.php");
    } else {
        echo "gagal diedit";
    }
}
