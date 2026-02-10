  <?php
  require "connect.php";
  // echo $_GET['id']
  $query = "select * from data_calon where id=?";
  $data = $connect->prepare($query);
  $data->bindParam(1, $_GET['id']);
  $data->execute();

  $tampil = $data->fetch(PDO::FETCH_OBJ);

  ?>
  <html>

  <head>
    <title>Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
      body {
        background-image: url(img/hero.jpg);
      }
    </style>
  </head>

  <body>
    <form action="proses_voting.php" method="POST">
      <div class="card" style="width: 30rem; margin: auto; margin-top: 10px;">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-body-secondary">Pilihan Anda</h6>
          <img src="<?= $tampil->foto ?>" class="card-img-top" alt="..." data-toggle='tooltip' data-placement='bottom' title='Foto Kandidat'>
          <input type='hidden' name='id' value='<?= $tampil->id ?>'>
          <h3 class="card-title"><?= $tampil->nama ?></h3>
          <p class="card-text"><b>Visi:</b><?= $tampil->visi ?><br><b>Misi:</b><?= $tampil->misi ?>
          <h6>Sudah Yakin?</h6>
          </p>
          <a href="home.php" class="card-link" " onclick='return konfirmasiUlang();'>Pilih Ulang</a>
        </div>
        <input type='hidden' name='id' value='<?= $tampil->id ?>'>
        <input type='submit' name='yakin' value='Pilih' style='font-size: 15px; background-color: blue; color: white; border-radius: 10px;' data-toggle='tooltip' data-placement='bottom' title='Yakin' onclick='return konfirmasiVoting();'>
      </div>
    </form>

    <script>
      $(function() {
        $('[data-toggle=" tooltip"]').tooltip(); }); </script>
            <script>
              function konfirmasiVoting() {
                // Gunakan window.confirm() untuk menampilkan dialog konfirmasi
                var konfirmasi = confirm("Sudah Yakin?");
                if (konfirmasi === true) {
                  // Jika pengguna mengonfirmasi, lanjutkan dengan penghapusan
                  return true;
                } else {
                  // Jika pengguna membatalkan, batalkan penghapusan
                  return false;
                }
              }
            </script>
            <script>
              function konfirmasiUlang() {
                // Gunakan window.confirm() untuk menampilkan dialog konfirmasi
                var konfirmasi = confirm("Memilih Ulang?");
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