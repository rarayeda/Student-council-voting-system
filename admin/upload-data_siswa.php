<?php
require '../vendor/autoload.php';
require 'connect.php';


if (isset($_POST['submit'])) {
    $eksetensi = "";

    $file_name = $_FILES['filexls']['name']; //get name di upload
    $file_data = $_FILES['filexls']['tmp_name']; //get temporaray data

    $eksetensi_allowed = array("xls", "xlsx");
    if (!in_array($eksetensi, $eksetensi_allowed)) {
        echo "<script>
                alert ('Silahkan Masukkan file tipe xls atau xlsx, File yang Anda Masukkan $file_name dengan tipe $eksetensi');
                window.location= 'siswa.php';
                </script>";
    }
    if (empty($err)) {
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $jumlahData = 0;
        for ($i = 0; $i < count($sheetData); $i++) {
            $nisn = $sheetData[$i]['0'];
            $nama = $sheetData[$i]['1'];
            $kelas = $sheetData[$i]['2'];

            // echo "$nisn - $nama - $kelas";
            $sql1 = "insert into data_siswa(nisn, nama_siswa, kelas_siswa) values ('$nisn', '$nama','$kelas') ";

            $connect = mysqli_connect('localhost', 'root', '', 'voting');
            mysqli_query($connect, $sql1);

            $jumlahData++;
        }
        if ($jumlahData > 0) {
            $success = "$jumlahData Berhasil dimasukkan ke Database";
            header("location: siswa.php");
        }
    }
}
