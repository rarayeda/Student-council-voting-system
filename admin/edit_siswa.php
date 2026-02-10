<?php
require "connect.php";
// echo $_GET['id']
$query = "SELECT * FROM data_siswa WHERE id=?";
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

        input {
            border: none;
        }
    </style>
</head>

<body>
    <form action="edit_siswa_proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $tampil->id ?>">
        <div class="card" style="width: 25rem; margin: auto; margin-top: 100px;">
            <div class="card-body">
                <div class="col-lg-6">
                    <a href="siswa.php"><img src="img/close.png" style="width: 30px;margin-left: 340px;" alt=""></a>
                </div>
                <div class="col-lg-6">
                    <h4 class="card-subtitle mb-2 text-body-secondary">Edit Siswa</h4>
                </div>
                <label for=""><b>Nisn:</b></label>
                <input type="text" name="nisn" style="border-bottom:2px solid black;" value="<?= $tampil->nisn ?>"><br>
                <label for=""><b>Siswa:</b></label>
                <input type="text" name="nama" style="border-bottom:2px solid black;" value="<?= $tampil->nama_siswa ?>"><br>
                <label for=""><b>Kelas:</b></label>
                <input type="text" name="kelas" style="border-bottom:2px solid black;" value="<?= $tampil->kelas_siswa ?>">
            </div>
            <input type="submit" name="edit" value="edit" style="font-size: 15px; background-color: blue; color: white; border-radius: 10px;">
        </div>
    </form>




</body>

</html>