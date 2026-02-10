<?php
require "connect.php";
if (isset($_POST['hapus-data'])) {
    echo $_POST['id'];

    $query = "DELETE FROM data_calon WHERE id=?";
    $data = $connect->prepare($query);
    $data->bindParam(1, $_POST['id']);
    $berhasil = $data->execute();

    if ($berhasil) {
        header("location:kandidat.php");
    } else {
        echo "gagal dihapus";
    }
}
