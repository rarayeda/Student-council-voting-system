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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Kandidat</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Masukkan tautan ke file CSS Anda di sini -->

</head>

<body>
  <div class="navigation">
    <div class="side">
      <ul>
        <li>
          <a href="#">
            <span class="title">Admin</span>
          </a>
        </li>

        <li>
          <a href="dashboard.php">
            <span class="icon">
              <ion-icon name="home-outline"></ion-icon>
            </span>
            <span class="title">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="siswa.php">
            <span class="icon">
              <ion-icon name="people-outline"></ion-icon>
            </span>
            <span class="title">Data Siswa</span>
          </a>
        </li>
        <li>
          <a href="kandidat.php" class="active">
            <span class="icon">
              <ion-icon name="person-outline"></ion-icon>
            </span>
            <span class="title">Data Kandidat</span>
          </a>
        </li>
        <li>
          <a href="logout.php" onclick='return konfirmasiLogOut();'>
            <span class="icon">
              <ion-icon name="exit-outline"></ion-icon>
            </span>
            <span class="title">Log Out</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="content">
    <h2 style="font-family: sans-serif;">Data Kandidat</h2>
    <h3 style="font-family: sans-serif; margin-top:20px">Hasil Voting</h3>
    <div style="width:100%; height:380px; margin-bottom: 30px">
      <canvas id="myChart"></canvas>
    </div>
    <div class="data" style="padding-top: 60px;">
      <a href="tambah_kandidat.php"><button type="button" class="btn btn-primary" style="margin-left:780px; margin-bottom: 10px;">tambah kandidat</button></a>
      <table class="demo-table responsive">
        <thead>
          <tr>
            <th>Kandidat No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Visi</th>
            <th>Misi</th>
            <th>Suara</th>
            <th>Periode
              <form action="" style="display: inline; margin-bottom:5px;">
                <select class="custom-select" name="periode" id="" style="border: none; outline: none; border-radius:10px;">
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
                <button type="submit" class="btn-f">run</button>
              </form>
            </th>
            <th style="text-align: center;" colspan=' 2'>Action
            </th>
          </tr>
        </thead>
        <tbody>
          <script>
            function konfirmasiHapus() {
              // Gunakan window.confirm() untuk menampilkan dialog konfirmasi
              var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data ini?");
              if (konfirmasi === true) {
                // Jika pengguna mengonfirmasi, lanjutkan dengan penghapusan
                return true;
              } else {
                // Jika pengguna membatalkan, batalkan penghapusan
                return false;
              }
            }
          </script>
          <?php
          $no = 1;
          foreach ($tampil as $t) {
            echo "
                                  <tr>
                                  <td>$no</td>
                                  <td> <img src='$t->foto' style='width: 250px;'></td>
                                  <td>$t->nama</td>
                                  <td>$t->visi</td>
                                  <td>$t->misi</td>
                                  <td>$t->suara</td>
                                  <td>$t->periode</td>
                                  <td>
                                      <a href='edit_kandidat.php?id=$t->id' style='padding:2px; text-decoration: none; background-color: green; color:white; border: green; border-radius: 5px; padding:5px' >Edit</a>
                                  </td>
                                  <td>
                                  <form action='hapus_kandidat.php' method='post' style='display: inline;'>
                                  <input type='hidden' name='id' value='$t->id'/>
                                  <input type='submit' name='hapus-data' value='Hapus' onclick='return konfirmasiHapus();' style='background-color:red; color:white; border-color:red; border-radius: 3px;'/>
                                 </form></td>
                                  </tr>
                                    ";
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

  <?php

  $json = json_encode($tampil);
  ?>

  <script>
    const json = <?= $json ?>

    function getRandomColor() {
      var letters = '0123456789ABCDEF';
      var color = '#';
      for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
      }
      return color;
    }

    const labels = json.map(dt => dt.nama);

    const data = {
      labels: labels,
      datasets: [{
        label: 'My First Dataset',
        data: json.map(dt => dt.suara),
        backgroundColor: json.map(() => getRandomColor()),
        borderColor: json.map(() => getRandomColor()),
        borderWidth: 1
      }]
    };
    const config = {
      type: 'bar',
      data: data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };

    var myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  </script>

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

</body>

</html>