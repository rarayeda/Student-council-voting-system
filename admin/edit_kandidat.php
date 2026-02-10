<?php
require "connect.php";
// echo $_GET['id']
$query = "SELECT * FROM data_calon WHERE id=?";
$data = $connect->prepare($query);
$data->bindParam(1, $_GET['id']);
$data->execute();

$tampil = $data->fetch(PDO::FETCH_OBJ);

?>
<html>

<head>
    <title>Edit Kandidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url(../img/background.jpg);
        }
    </style>
</head>

<body>
    <form action="edit_kandidat_proses.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $tampil->id ?>">
        <div class="container">
            <div class="card" style="width: 25rem; margin: auto; margin-top: 10px;">
                <div class="card-body">
                    <div class="col-lg-6">
                        <a href="kandidat.php"><img src="img/close.png" style="width: 30px;margin-left: 340px;" alt=""></a>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="card-subtitle mb-2 text-body-secondary">Edit Kandidat</h4>
                    </div>
                    <label>Foto kandidat</label><br>
                    <img src="<?= $tampil->foto ?>" style="width: 370px;">
                    <label>Ganti Foto Kandidat</label>
                    <input type="file" name="foto" value="<?= $tampil->foto ?>"><br>
                    <label for="">Nama Kandidat :</label>
                    <input type="text" name="nama" value="<?= $tampil->nama ?>"><br>
                    <label for="">Visi :</label><br>
                    <textarea name="visi" style="width: 300px; height:200px"> <?= $tampil->visi ?></textarea><br>
                    <label for="">Misi :</label><br>
                    <textarea name="misi" style="width: 300px; height:200px"> <?= $tampil->misi ?></textarea><br>
                </div>
                <input type='submit' name='edit' value='edit' style='font-size: 15px; background-color: blue; color: white; border-radius: 10px;'>
            </div>
        </div>
    </form>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>