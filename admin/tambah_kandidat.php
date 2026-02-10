<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kandidat</title>
    <style>
        .form {
            background-color: white;
            width: 500px;
            margin: auto;
            padding: 3.125em;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 5px 5px 15px -1px rgba(0, 0, 0, 0.75);
        }

        .signup {
            color: rgb(77, 75, 75);
            text-transform: uppercase;
            letter-spacing: 2px;
            display: block;
            font-weight: bold;
            font-size: x-large;
            margin-bottom: 0.5em;
        }

        .form--input {
            width: 500px;
            margin-bottom: 1.25em;
            height: 40px;
            border-radius: 5px;
            border: 1px solid gray;
            padding: 0.8em;
            font-family: 'Inter', sans-serif;
            outline: none;
        }

        .form--input:focus {
            border: 1px solid #639;
            outline: none;
        }

        .form--marketing {
            display: flex;
            margin-bottom: 1.25em;
            align-items: center;
        }

        .form--marketing>input {
            margin-right: 0.625em;
        }

        .form--marketing>label {
            color: grey;
        }

        .checkbox,
        input[type="checkbox"] {
            accent-color: #639;
        }

        .form--submit {
            width: 50%;
            padding: 0.625em;
            border-radius: 5px;
            color: white;
            background-color: #639;
            border: 1px dashed #639;
            cursor: pointer;
        }

        .form--submit:hover {
            color: #639;
            background-color: white;
            border: 1px dashed #639;
            cursor: pointer;
            transition: 0.5s;
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

        .cancel {
            color: black;
            padding-left: -10px;
            margin-top: -30px;
            margin-left: -55px;
        }
    </style>
</head>

<body>
    <form method="post" class="form" action="tambah_kandidat_proses.php" enctype="multipart/form-data">
        <div class="cancel" style="width:500px;">
            <a href="kandidat.php" style="text-decoration: none;">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a>
        </div>
        <span class="signup">Masukkan Data Kandidat</span>
        <select name="periode" id="" class="form--input">
            <?php
            $list_tahun = [];
            $tahun_mulai = 2023;
            $tahun_akhir = date('Y') + 2;

            for ($i = 0; $i <= $tahun_akhir - $tahun_mulai; $i++) {
                array_push($list_tahun, $tahun_mulai + $i);
            }

            foreach ($list_tahun  as $tahun) :
            ?>
                <option value="<?= $tahun ?>"><?= $tahun ?></option>
            <?php endforeach ?>
        </select>
        <input type="text" placeholder="Masukkan Nama Kandidat" name="nama" class="form--input" required>
        <input type="file" placeholder="Masukkan Foto Kandidat" name="foto" class="form--input" required>
        <input type="text" placeholder="Masukkan Visi Kandidat" name="visi" class="form--input" required>
        <input type="text" placeholder="Masukkan Misi Kandidat" name="misi" class="form--input" required>
        <button type="submit" name="tambah" value="tambah">Tambah</button>
    </form>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>