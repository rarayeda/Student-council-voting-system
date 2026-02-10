<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>tambah data siswa</title>
	<style>
		.form {
			position: relative;
			width: 500px;
			margin: auto;
			margin-top: 75px;
			display: flex;
			flex-direction: column;
			gap: 10px;
			padding: 20px;
			background: linear-gradient(to bottom, #0077be, #3b8df2);
			border-radius: 10px;
			overflow: hidden;
			perspective: 1000px;
			transform-style: preserve-3d;
			transform: rotateX(-10deg);
			transition: all 0.3s ease-in-out;
			box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
			animation: form-animation 0.5s ease-in-out;
		}

		@keyframes form-animation {
			from {
				transform: rotateX(-30deg);
				opacity: 0;
			}

			to {
				transform: rotateX(0deg);
				opacity: 1;
			}
		}

		.input {
			padding: 10px;
			border-radius: 5px;
			background-color: transparent;
			transition: border-color 0.3s ease-in-out, background-color 0.3s ease-in-out, transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
			transform-style: preserve-3d;
			backface-visibility: hidden;
			color: rgb(255, 255, 255);
			border: 2px solid #3b8df2;
			box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
		}

		.input::placeholder {
			color: #fff;
		}

		.input:hover,
		.input:focus {
			border-color: #3b8df2;
			background-color: rgba(255, 255, 255, 0.2);
			transform: scale(1.05) rotateY(20deg);
			box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
			outline: none;
		}

		button {
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			background-color: #3b8df2;
			color: #fff;
			font-size: 16px;
			cursor: pointer;
			transform-style: preserve-3d;
			backface-visibility: hidden;
			transform: rotateX(-10deg);
			transition: all 0.3s ease-in-out;
			box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
		}

		button:hover {
			background-color: #0077be;
			font-size: 17px;
			transform: scale(1.05) rotateY(20deg) rotateX(10deg);
			box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
		}

		h1 {
			color: #fff;
		}

		label {
			color: #fff;
		}
	</style>
</head>

<body>
	<form class="form" action="tambah_siswa_proses.php" method="POST">
		<div class="cancel" style="width:500px;">
			<a href="kandidat.php" style="text-decoration: none;">
				<ion-icon name="arrow-back-outline" style="color: #fff;"></ion-icon>
			</a>
		</div>
		<h1>Tambah Data Siswa</h1>
		<label>Masukkan NISN Siswa :</label>
		<input class="input" type="text" name="nisn" required>
		<label>Masukkan Nama Siswa :</label>
		<input class="input" type="text" name="nama" required>
		<label>Masukkan Kelas Siswa :</label>
		<input class="input" type="text" name="kelas" required>

		<button type="submit" name="tambah">Tambah</button>
	</form>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>