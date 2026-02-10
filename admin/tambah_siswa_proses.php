	<?php
	require "connect.php";

	if (isset($_POST['tambah'])) {
		$query = "INSERT INTO data_siswa(nisn, nama_siswa, kelas_siswa) VALUES(?, ?, ?)";
		$data = $connect->prepare($query);
		$data->bindParam(1, $_POST['nisn']);
		$data->bindParam(2, $_POST['nama']);
		$data->bindParam(3, $_POST['kelas']);

		$berhasil = $data->execute();

		if ($berhasil) {
			header("location: siswa.php");
		} else {
			echo "Data Gagal Disimpan";
		}
	}
