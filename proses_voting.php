<?php
require "connect.php";
if (isset($_POST['yakin'])) {
	$query = "UPDATE data_calon SET suara = suara + 1 	WHERE id = ?";
	// var_dump($_POST['id']);
	// die;
	$data = $connect->prepare($query);
	$data->bindParam(1, $_POST['id']);

	$berhasil = $data->execute();
	if ($berhasil) {

		session_start();
		$nisn = $_SESSION['nisn'];
		$query = "UPDATE data_siswa SET memilih = memilih + 1 WHERE nisn = '$nisn'";
		$data = $connect->prepare($query);

		// var_dump($query);
		// die;

		$data->execute();

		echo "<script>
		    alert ('Voting Berhasil! Terimakasih telah berpartisipasi');
		    window.location= 'index.php';
		    </script>";
	} else {
		echo "<script>
		    alert ('Voting Gagal! Silahkan coba lagi');
		    window.location= 'index.php';
		    </script>";
	}
}
