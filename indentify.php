<?php
session_start();
if (!isset($_SESSION['nisn']) && !isset($_SESSION['nama'])) {
    header("location: index .php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Indentify</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
            background-image: url(img/background.jpg);
        }

        .content .tulisan {
            font-size: 20px;
            font-weight: 400;
            margin-bottom: 35px;
            color: #555843;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="text">
            Konfirmasi Diri
        </div>
        <h5 class="tulisan" style="border-bottom: 2px dotted red;">Nisn: <?= $_SESSION['nisn']  ?></h5>
        <h5 class="tulisan" style="border-bottom: 2px dotted red;">Nama: <?= $_SESSION['nama']  ?></h5>
        <h5 class="tulisan" style="border-bottom: 2px dotted red;">Kelas: <?= $_SESSION['kelas']  ?></h5>
        <div class="tombol" style="margin-left: 170px;">
            <a href="index.php"><button style="background-color:#BB2525; color:aliceblue; border-radius:5px;">Bukan Saya</button></a>
            <a href="home.php"><button style="background-color:#3085C3; color:aliceblue; border-radius:5px">Ini Saya</button></a>
        </div>
    </div>
    <!-- tooltip -->
    <script>
        $(function() {
            $(' [data-toggle="tooltip" ]').tooltip();
        });
    </script>
</body>

</html>