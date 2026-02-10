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
<html>

<head>
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
    body {
      background-image: url(../img/hero.jpg);
    }

    @import url("@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap");

    :root {
      /* colours */

      --clr-white: hsl(0, 0%, 100%);
      --clr-black: hsl(0, 0%, 0%);
      --clr-grey: hsl(0, 0%, 21%);
      --clr-prime: hsl(212, 100%, 46%);
      --clr-accent: hsl(210, 98%, 64%);

      /* font size */
      --fw-reg: 500;
      --fw-bold: 600;
    }

    /* Set html defaults */
    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    /* Main */



    .container {
      display: flex;
      width: 85%;
      margin-left: 210px;
      flex-wrap: wrap;
      flex-direction: column;
      align-content: center;
      justify-content: center;
      gap: 2rem;
    }

    @media only screen and (min-width: 42rem) {
      .container {
        flex-direction: row;
      }
    }

    .card {
      position: relative;
      background-color: var(--clr-white);
      border: 1px solid var(--clr-prime);
      max-width: 15rem;
      height: 10rem;
      margin-top: 5rem;
      border-radius: 0.9rem;
      overflow: hidden;
      transition: 0.3s ease-in-out;
      box-shadow: -5px -5px 25px -1px rgba(0, 0, 0, 0.52);
      -webkit-box-shadow: -5px -5px 25px -1px rgba(0, 0, 0, 0.52);
      -moz-box-shadow: -5px -5px 25px -1px rgba(0, 0, 0, 0.52);
    }

    .card:hover {
      transform: translateY(-15px);
    }

    .card-content {
      padding: 2rem;
    }

    .card-date {
      color: var(--clr-prime);
    }

    .card-title {
      color: var(--clr-black);
    }

    .card-date,
    .card-title {
      font-weight: var(--fw-bold);
      text-transform: uppercase;
      font-size: 1rem;
    }

    .card-text {
      margin: 0.5rem auto;
      font-size: 1rem;
      color: var(--clr-grey);
    }

    .btn {
      display: inline-block;
      background-color: var(--clr-prime);
      padding: 0.6rem 1rem;
      border-radius: 0.5rem;
      color: var(--clr-white);
      text-decoration: none;
      text-transform: uppercase;
      font-size: 1rem;
      font-weight: var(--fw-reg);
      margin-top: 1rem;
      transition: 0.3s ease-in-out;
    }

    .btn:hover {
      background-color: var(--clr-accent);
      scale: 1.1;
    }
  </style>
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
          <a href="dashboard.php" class="active">
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
          <a href="kandidat.php">
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
  <div class="container">
    <div class="" style="width:  500px; height: 400px; margin-left:155px; margin-top:30px">
      <canvas id="myChart"></canvas>
    </div>
    <div class="bottom" style="margin-top:500px">
      <form action="" style="display: inline; margin-bottom:5px;">
        <select class="custom-select" name="periode" id="">
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
        <button type="submit" class="btn-f">Filter Periode</button>
      </form>
    </div>
    <div class="card">
      <div class="card-content">
        <div class="card-info">
          <div class="card-date">Jumlah Siswa</div>
        </div>
        <h1 class="card-title">
          <?php
          $connect = mysqli_connect('localhost', 'root', '', 'voting');
          $data_siswa = mysqli_query($connect, "SELECT * FROM data_siswa");
          $jumlah_data = mysqli_num_rows($data_siswa);
          echo "$jumlah_data orang";
          ?>
        </h1>
        <a href="siswa.php" class="btn">more</a>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <div class="card-info">
          <div class="card-date">Jumlah Siswa Belum Voting</div>
        </div>
        <h1 class="card-title">
          <?php
          $connect = mysqli_connect('localhost', 'root', '', 'voting');
          $data_siswa = mysqli_query($connect, "select memilih from data_siswa where memilih='0'");
          $jumlah_data = mysqli_num_rows($data_siswa);
          echo "$jumlah_data Orang";
          ?>
        </h1>
        <a href="memilih_belum.php" class="btn">more</a>
      </div>
    </div>
    <div class="card">
      <div class="card-content">
        <div class="card-info">
          <div class="card-date">Jumlah Siswa Sudah Voting</div>
        </div>
        <h1 class="card-title">
          <?php
          $connect = mysqli_connect('localhost', 'root', '', 'voting');
          $data_siswa = mysqli_query($connect, "select memilih from data_siswa where memilih='1'");
          $jumlah_data = mysqli_num_rows($data_siswa);
          echo "$jumlah_data Orang";
          ?>
        </h1>
        <a href="memilih_sudah.php" class="btn">more</a>
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
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    const data = {
      labels: json.map(dt => dt.nama),
      datasets: [{
        label: 'My First Dataset',
        data: json.map(dt => dt.suara),
        // backgroundColor: [
        //   'rgb(255, 99, 132)',
        //   'rgb(54, 162, 235)',
        //   'rgb(255, 205, 86)'
        // ],
        backgroundColor: json.map(() => getRandomColor()),
        hoverOffset: 4
      }]
    };
    const config = {
      type: 'doughnut',
      data: data,
    };
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    )
  </script>
</body>

</html>