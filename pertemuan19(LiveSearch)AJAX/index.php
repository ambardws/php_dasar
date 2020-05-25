<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
// ambil data dari tabel mahasiswa / query data buku
$buku = query("SELECT * FROM buku");

// tombol cari di tekan
if (isset($_POST["cari"])) {
    $buku = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Halaman Admin</title>
</head>

<body>
    <div class="container-fluid">
        <h1 class="text-center">Data Buku</h1>
        <a class="btn btn-primary" href="tambah.php" role="button">+ Tambah Data Buku</a>
        <a class="btn btn-danger" href="logout.php" role="button">LogOut</a>

        <form class="form-inline mt-2" action="" method="POST">
            <input type="text" name="keyword" class="form-control mb-2 mr-sm-2" placeholder="Cari Data" autofocus autocomplete="off" id="keyword">
            <button type="submit" name="cari" class="btn btn-secondary mb-2" id="tombol-cari">Cari</button>
        </form>
        <div id="containerTable">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td>
                                <div class="text-center">
                                    <a href="ubah.php?id=<?= $row["id"] ?>">Ubah</a> |
                                    <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Anda Yakin?');">Hapus</a>
                                </div>
                            </td>
                            <td><img src="img/<?= $row["gambar"] ?>" height="100px" width="100px" alt=""></td>
                            <td><?= $row["judul"] ?></td>
                            <td><?= $row["penulis"] ?></td>
                            <td><?= $row["penerbit"] ?></td>
                            <td><?= $row["tahun"] ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <Script src="js/script.js"></Script>
</body>

</html>