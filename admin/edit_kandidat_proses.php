<?php
require "connect.php";
require "upload-img.php";
if (isset($_POST['edit'])) {
    $foto = uploadImage($_FILES['foto'], 'img/');
    $query = "SELECT * FROM data_calon WHERE id=?";
    $data_old = $connect->prepare($query);
    $data_old->bindParam(1, $_POST['id']);
    $data_old->execute();

    $tampil = $data_old->fetch(PDO::FETCH_OBJ);

    if (!$foto) {
        // var_dump($query, $tampil);
        // die;
        $foto = $tampil->foto;
    }
    $query = "UPDATE data_calon SET foto=?, nama=?, visi=?, misi=? WHERE id=?";
    $data = $connect->prepare($query);
    $data->bindParam(1, $foto);
    $data->bindParam(2, $_POST['nama']);
    $data->bindParam(3, $_POST['visi']);
    $data->bindParam(4, $_POST['misi']);
    $data->bindParam(5, $_POST['id']);
    $data->execute();


    $berhasil = $data->execute();

    if ($berhasil) {
        header("Location: kandidat.php");
    } else {
        echo "gagal diedit";
    }
}
