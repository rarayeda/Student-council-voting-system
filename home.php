<?php
require "connect.php";
$periode = 2023;

if (@$_GET['periode']) {
  $periode = $_GET['periode'];
}


$query = "SELECT * FROM data_calon WHERE periode = '$periode'";
$data = $connect->prepare($query);
$data->execute();
$tampil = $data->fetchAll(PDO::FETCH_OBJ);

session_start();
$nisn = $_SESSION['nisn'];

$dt = $connect->prepare("SELECT * FROM data_siswa WHERE nisn ='$nisn'");
$dt->execute();
$siswa =  $dt->fetch(PDO::FETCH_OBJ);

// var_dump($siswa);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <style>
    body {
      margin: 0;
      height: 0;
    }

    body {
      background-image: url(img/hero.jpg);

    }

    .card-container {
      margin-left: 27px;
    }

    .my-custom-select [slot='button'] {
      display: flex;
      align-content: center;
    }

    .my-custom-select button {
      padding: 5px;
      border: none;
      background: #f06;
      border-radius: 5px 0 0 5px;
      color: white;
      font-weight: bold;
    }

    .my-custom-select .label {
      padding: 5px;
      border: 1px solid #f06;
      border-radius: 0 5px 5px 0;
    }

    .text-monospace {
      font-size: 40px;
      font-weight: 400;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      color: black;
    }
  </style>
</head>

<body>
  <div class="" style="display: flex; gap: 16px; align-items: center; justify-content: center">
    <h3 class="text-monospace font-weight-bold text-center " style="position: relative; ">KANDIDAT KETUA OSIS </h3>
    <form action="" style="display: flex;">
      <h3> <select name="periode" id="" class="my-custom-select" style="border: none; outline: none; border-radius:10px; font-weight:700"></h3>

      <?php
      $list_tahun = [];
      $tahun_mulai = 2023;
      $tahun_akhir = date('Y') + 2;

      for ($i = 0; $i <= $tahun_akhir - $tahun_mulai; $i++) {
        array_push($list_tahun, $tahun_mulai + $i);
      }

      foreach ($list_tahun  as $tahun) :
      ?>
        <option value="<?= $tahun ?>" <?= $tahun == $periode ? 'selected' : '' ?>><?= $tahun ?></option>
      <?php endforeach ?>
      </select>
      <button type="submit" style="border: none; border-radius:10px; font-weight:500"><ion-icon name="caret-forward-circle-outline"></ion-icon></button>
    </form>
  </div>
  <div class='row'>
    <?php
    //Untuk menampikan data menggunakan perulanagan foreach
    foreach ($tampil as  $t) {
      $output = " <a href='validation.php?id=$t->id' class='btn btn-primary' 
      style='text-decoration: none;' data-toggle='tooltip' data-placement='bottom' 
      title='Pilih Kandidat'>
      Pilih</a>";

      if ($siswa->memilih > 0) {
        $output = "
        '<script>
		    alert ('Anda Sudah Melakukan Voting');
		    window.location= 'index.php';
		    </script>';
      ";
      }
      echo "
        <div class='card-container mt-1'>
            <div class='card' style='width:390px;'>
              <img src='$t->foto '  data-toggle='tooltip' data-placement='bottom' 
              title='Foto Kandidat'>
              <div class='card-body'>  
                <input type='hidden' name='id' value='$t->id'>
                <div class='card-title'><h4>
                  $t->nama
                </h4></div>
                <div class='card-text'>
               <b> Visi:</b> $t->visi
                </div>
                <div class='card-text'>
               <b> Misi:</b> $t->misi
                </div>
              </div>
             $output
             </div>
        </div>
            ";
    }
    ?>
  </div>

  <!-- tooltip -->
  <script>
    $(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kirim Pilihan?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

          <a href="succes.php?id<?= $t->id ?>" class="btn btn-primary" style="text-decoration: none;">Kirim</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function konfirmasiLogOut() {
      // Gunakan window.confirm() untuk menampilkan dialog konfirmasi
      var konfirmasi = confirm("Apakah Anda yakin ingin Log Out?");
      if (konfirmasi === true) {
        // Jika pengguna mengonfirmasi, lanjutkan dengan penghapusan
        return true;
      } else {
        // Jika pengguna membatalkan, batalkan penghapusan
        return false;
      }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>