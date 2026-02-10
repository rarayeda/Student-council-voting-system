<?php
require "connect.php";
require "upload-img.php";

if (isset($_POST['tambah'])) {
    $foto = uploadImage($_FILES['foto'], 'img/');
    // var_dump($foto);
    // die;
    $query = "INSERT INTO data_calon (nama, foto, visi, misi, periode) VALUES(?, ?, ?,?,?)";
    $data = $connect->prepare($query);
    $data->bindParam(1, $_POST['nama']);
    $data->bindParam(2, $foto);
    $data->bindParam(3, $_POST['visi']);
    $data->bindParam(4, $_POST['misi']);
    $data->bindParam(5, $_POST['periode']);

    $berhasil = $data->execute();

    if ($berhasil) {
        header("location: kandidat.php");
    } else {
        echo "Data Gagal Disimpan";
    }
}
