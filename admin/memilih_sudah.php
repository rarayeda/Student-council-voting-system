<?php
require "connect.php";
$query = "SELECT * FROM data_siswa WHERE memilih='1'";
$data = $connect->prepare($query);
$data->execute();
$tampil = $data->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Masukkan tautan ke file CSS Anda di sini -->

</head>


<body>
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
                    <a href="siswa.php" class="active">
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
    <div class="content">
        <h2 style="font-family: sans-serif;">Data siswa Yang Sudah Memilih</h2><br>
        <div id="modal" class="modal">
            <div class="modal-content">
                <span id="tutupModal" class="close">&times;</span>
                <form action="upload-data_siswa.php" style="margin-top: 15px;" method="post" enctype="multipart/form-data">
                    <h4 style="font-family: sans-serif;">Tambah Data siswa</h4>
                    <label style="font-family: sans-serif;">Pilih File Excel:</label>
                    <input type="file" name="filexls" id="formFile" class="tombol" required>
                    <input type="submit" class="tombol" value="Upload" name="submit">
                </form>
                <span style="font-family: sans-serif;">Tambah Data Siswa:</span>
                <a href="tambah_siswa.php"><button type="button" class="tombol" style="margin-bottom:5px;">tambah data siswa</button></a>
            </div>
        </div>


        <table class="demo-table responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Kelas</th>
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
                                  <td>$t->nisn</td>
                                  <td>$t->nama_siswa</td>
                                  <td>$t->kelas_siswa</td>
                                  </tr>
                                    ";
                    $no++;
                }
                ?>
            </tbody>
        </table>




    </div>
    <!-- Masukkan tautan ke file JavaScript Anda di sini -->
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
    <script>
        // Ambil elemen-elemen HTML yang diperlukan
        var modal = document.getElementById('modal');
        var tampilkanModalBtn = document.getElementById('tampilkanModal');
        var tutupModalBtn = document.getElementById('tutupModal');

        // Tampilkan modal ketika tombol "Tampilkan Modal" diklik
        tampilkanModalBtn.addEventListener('click', function() {
            modal.style.display = 'block';
        });

        // Tutup modal ketika tombol "X" di klik
        tutupModalBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        // Tutup modal ketika area luar modal diklik
        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>